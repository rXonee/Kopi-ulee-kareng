<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_dapat_diakses(): void
    {
        $response = $this->get(route('landing'));

        $response->assertOk();
        $response->assertSee('Kopi Ulee Kareng');
    }

    public function test_produk_valid_dapat_disimpan(): void
    {
        $response = $this->post(route('products.store'), [
            'product_name' => 'Kopi Test',
            'description' => 'Produk untuk pengujian.',
            'price' => 20000,
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'product_name' => 'Kopi Test',
            'price' => 20000,
        ]);
    }

    public function test_produk_dapat_diedit(): void
    {
        $product = Product::create([
            'product_name' => 'Kopi Lama',
            'description' => 'Deskripsi lama',
            'price' => 15000,
        ]);

        $response = $this->put(route('products.update', $product), [
            'product_name' => 'Kopi Baru',
            'description' => 'Deskripsi baru',
            'price' => 18000,
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'product_name' => 'Kopi Baru',
        ]);
    }

    public function test_produk_dapat_dihapus(): void
    {
        $product = Product::create([
            'product_name' => 'Kopi Hapus',
            'description' => 'Akan dihapus',
            'price' => 10000,
        ]);

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    public function test_validasi_gagal_jika_field_kosong_saat_tambah(): void
    {
        $response = $this->post(route('products.store'), []);

        $response->assertSessionHasErrors(['product_name', 'description', 'price']);
    }

    public function test_validasi_gagal_jika_field_kosong_saat_edit(): void
    {
        $product = Product::create([
            'product_name' => 'Kopi Valid',
            'description' => 'Deskripsi valid',
            'price' => 12000,
        ]);

        $response = $this->put(route('products.update', $product), []);

        $response->assertSessionHasErrors(['product_name', 'description', 'price']);
    }

    public function test_validasi_gagal_jika_nama_produk_duplikat_saat_tambah(): void
    {
        Product::create([
            'product_name' => 'Kopi Duplikat',
            'description' => 'Deskripsi lama',
            'price' => 10000,
        ]);

        $response = $this->post(route('products.store'), [
            'product_name' => 'Kopi Duplikat',
            'description' => 'Deskripsi baru',
            'price' => 15000,
        ]);

        $response->assertSessionHasErrors(['product_name']);
    }

    public function test_validasi_gagal_jika_nama_produk_duplikat_saat_edit(): void
    {
        Product::create([
            'product_name' => 'Kopi Pertama',
            'description' => 'Deskripsi',
            'price' => 10000,
        ]);

        $secondProduct = Product::create([
            'product_name' => 'Kopi Kedua',
            'description' => 'Deskripsi',
            'price' => 15000,
        ]);

        $response = $this->put(route('products.update', $secondProduct), [
            'product_name' => 'Kopi Pertama',
            'description' => 'Deskripsi update',
            'price' => 20000,
        ]);

        $response->assertSessionHasErrors(['product_name']);
    }

    public function test_produk_dapat_diupdate_tanpa_mengubah_nama(): void
    {
        $product = Product::create([
            'product_name' => 'Kopi Tetap',
            'description' => 'Deskripsi awal',
            'price' => 10000,
        ]);

        $response = $this->put(route('products.update', $product), [
            'product_name' => 'Kopi Tetap',
            'description' => 'Deskripsi diperbarui',
            'price' => 15000,
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'product_name' => 'Kopi Tetap',
            'description' => 'Deskripsi diperbarui',
        ]);
    }
}
