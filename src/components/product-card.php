<?php

function productCard($product) {

  echo '
  <a id="product-' . $product['id'] . '" href="/" class="card card-compact flex-1 bg-base-100 shadow-xl">
    <figure>
      <img src="' . $product["imageUrl"] . '" alt="Shoes" />
    </figure>
    <div class="card-body">
      <h2 class="card-title">' . $product["name"] . '</h2>
      <p>' . $product["description"] . '</p>
      <div class="card-actions justify-between items-center">
        <p class="text-base text-left">€' . $product["price"] . '</p>
        <span class="countdown font-mono text-base">
          <span id="hours" style="--value:00;"></span>:
          <span id="minutes" style="--value:00;"></span>:
          <span id="seconds" style="--value:00;"></span>
        </span>
      </div>
    </div>
  </a>

  <script>
    countdown("' . $product['id'] . '");
  </script>
  ';
}
