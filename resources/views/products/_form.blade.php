<div class="form-group">
    <label for="product_name">Nama produk</label>
    <input
        id="product_name"
        name="product_name"
        type="text"
        value="{{ old('product_name', $product->product_name ?? '') }}"
        class="form-control @error('product_name') is-invalid @enderror"
    >
    @error('product_name')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="description">Deskripsi</label>
    <textarea
        id="description"
        name="description"
        rows="5"
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="price">Harga</label>
    <input
        id="price"
        name="price"
        type="number"
        min="0"
        value="{{ old('price', $product->price ?? '') }}"
        class="form-control @error('price') is-invalid @enderror"
    >
    @error('price')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="image">Gambar Produk (opsional)</label>
    <input
        id="image"
        name="image"
        type="file"
        class="form-control @error('image') is-invalid @enderror"
        accept="image/*"
    >
    @error('image')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="stock">stok</label>
    <input
        id="stock"
        name="stock"
        type="number"
        min="0"
        value="{{ old('price', $product->stock ?? '') }}"
        class="form-control @error('stock') is-invalid @enderror"
    >
    @error('stock')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-actions">
    <button class="btn" type="submit">{{ $tombol }}</button>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">
        Batal
    </a>
</div>
