<?php
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitRequest;

class ProduitController extends Controller
{
    // Afficher tous les produits
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', ['produits' => $produits]);
    }

    // Afficher le formulaire de création d'un produit
    public function create()
    {
        return view('produits.create');
    }

    // Enregistrer un nouveau produit
    public function store(ProduitRequest $request){
    $imagePath = $request->file('image')->store('images');

    Produit::create([
        'nom' => $request->input('nom'),
        'description' => $request->input('description'),
        'prix_achat' => $request->input('prix_achat'),
        'prix_vente' => $request->input('prix_vente'),
        'stock' => $request->input('stock'),
        'nombre_packets' => $request->input('nombre_packets'),
        'code_barre' => $request->input('code_barre'),
        'image' => $imagePath,
    ]);

    return redirect()->route('produits.index')->with('success', 'Produit créé avec succès');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', ['produit' => $produit]);
    }

    public function edit(Produit $produit)
    {
        return view('produits.edit', ['produit' => $produit]);
    }

    public function update(ProduitRequest $request, Produit $produit)
    {


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        } else {
            $data['image'] = $produit->image;
        }

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    // Supprimer un produit
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }
}
