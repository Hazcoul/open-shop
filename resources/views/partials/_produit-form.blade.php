@csrf
<div class="form-group">
    <label for="">Désignation*: </label>
    <input value="{{ old('designation') ?? $produit->designation }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
    @error('designation')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="form-group">
      <label for="">Prix *: </label>
      <input value="{{ old('prix') ?? $produit->prix }}" type="number" name="prix" id="prix" class="form-control" placeholder="donner un prix en FCFA" aria-describedby="helpId" required>
      @error('prix')
      <small class="text-danger">{{ $message }}</small>
      @enderror
  </div>

  <div class="form-group">
      <label for="">Quantité *: </label>
      <input value="{{ old('quantite') ?? $produit->quantite }}" type="number" name="quantite" id="quantite" class="form-control" placeholder="" aria-describedby="helpId" required>
      @error('quantite')
      <small class="text-danger">{{ $message }}</small>
      @enderror
  </div>

  <div class="form-group">
    <label for="">Catégorie *: </label>
    <select class="form-control" name="category_id" id="categorie">
      @foreach($categories as $categorie)
      <option {{ $categorie->id==$produit->category_id ? "selected" : "" }} value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
      @endforeach
    </select>
    @error('categorie')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="form-group">
    <label for="">Description: </label>
    <textarea class="form-control" name="description" id="description" rows="2">{{ old('description') ?? $produit->description }}</textarea>
    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="form-group">
    <label for="">Image</label>
    <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
    @error('image')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary btn-block btn-lg">Valider</button>