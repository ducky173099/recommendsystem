<?php declare(strict_types=1);

namespace App;
use App\Models\Product;
use App\Models\Feature;
use App\Models\CategoryProduct;
use Exception;

class ProductSimilarity
{
    protected $products       = [];
    protected $featureWeight  = 1;
    protected $priceWeight    = 1;
    protected $categoryWeight = 1;
    protected $priceHighRange = 1000;

    public function __construct(array $products)
    // public function __construct(Product $products)
    {
        $this->products       = $products;
        $this->priceHighRange = max(array_column($products, 'price'));
    }

    public function setFeatureWeight(float $weight): void
    {
        $this->featureWeight = $weight;
    }

    public function setPriceWeight(float $weight): void
    {
        $this->priceWeight = $weight;
    }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->products as $product) {

            $similarityScores = [];

            foreach ($this->products as $_product) {
                if ($product->id === $_product->id) {
                    continue;
                }
                $similarityScores['product_id_' . $_product->id] = $this->calculateSimilarityScore($product, $_product);
            }
            $matrix['product_id_' . $product->id] = $similarityScores;
        }
        return $matrix;
    }

    public function getProductsSortedBySimularity(int $productId, array $matrix): array
    {
        $similarities   = $matrix['product_id_' . $productId] ?? null;
        $sortedProducts = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find product with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $productIdKey => $similarity) {
            $id      = intval(str_replace('product_id_', '', $productIdKey));
            $products = array_filter($this->products, function ($product) use ($id) { return $product->id === $id; });
            if (! count($products)) {
                continue;
            }
            $product = $products[array_keys($products)[0]];
            $product->similarity = $similarity;
            $sortedProducts[] = $product;
        }
        return $sortedProducts;
    }

    protected function calculateSimilarityScore($productA, $productB)
    {
        // $cc =$productA->with('feature')->get();
        // dd($productA);

        // $featureA = \DB::table('products')->join('features','products.feature_id', '=', 'features.id')
        // ->where('products.id', $productA->id)
        // ->where('features.id', $productA->feature_id)
        // ->get();

        // $featureB = \DB::table('products')->join('features','products.feature_id', '=', 'features.id')
        // ->where('products.id', $productB->id)
        // ->where('features.id', $productB->feature_id)
        // ->get();

        $featureA = Feature::find($productA->feature_id);
        $featureB = Feature::find($productB->feature_id);

        $categoriesA = CategoryProduct::find($productA->category_id);
        $categoriesB = CategoryProduct::find($productB->category_id);
    
        // dd($categoriesA);

        // $productAFeatures = implode('', get_object_vars($productA->features));
        // $productBFeatures = implode('', get_object_vars($productB->features));

        $productAFeatures = implode('', get_object_vars($featureA));
        $productBFeatures = implode('', get_object_vars($featureA));

        // dd($productAFeatures);

        return array_sum([
            (Similarity::hamming($productAFeatures, $productBFeatures) * $this->featureWeight),
            (Similarity::euclidean(
                Similarity::minMaxNorm([$productA->price], 0, $this->priceHighRange),
                Similarity::minMaxNorm([$productB->price], 0, $this->priceHighRange)
            ) * $this->priceWeight),
            // (Similarity::jaccard($productA->categories, $productB->categories) * $this->categoryWeight)
            (Similarity::jaccard($categoriesA->category_name, $categoriesB->category_name) * $this->categoryWeight)
        ]) / ($this->featureWeight + $this->priceWeight + $this->categoryWeight);
    }
}
