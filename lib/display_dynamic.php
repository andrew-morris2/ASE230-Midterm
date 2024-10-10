<?php
function displayClothingImages($jsonFile) {
    $data = file_get_contents($jsonFile);
    $clothingItems = json_decode($data, true);
    $i = 0;
    foreach ($clothingItems as $item) {
        if (isset($item['image']) && $i < 8) {
           echo '
           <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="' . $item['image'] . '" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">' . $item['name'] . '</h5>
                            <!-- Product price-->
                            $' . $item['price'] . '
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">More details</a></div>
                    </div>
                </div>
            </div>
           ';
           $i++;
        };
    };
};
?>

