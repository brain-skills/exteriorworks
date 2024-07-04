<div class="row">
    {foreach $productsList as $product}
        {assign var='categories' value=','|explode:$product.categories}
        <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="card mb-3">
                <div class="card-body">
                    <span class="position-absolute float-start badge rounded-1 bg-dark m-1">{$product.converted_price} {$currentCurrency}</span>
                    <a href="/products/{$product.alt_name}">
                        <img class="img-responsive" src="../{$product.image}" alt="">
                        <h6 class="mt-2 mb-0 text-center" style="height: 50px">{$product.title|truncate:60:"..."}</h6>
                    </a>
                    <form class="add-to-cart-form">
                        <div class="input-group">
                            <input class="form-control" type="hidden" name="product_id" value="{$product.id}">
                            <input class="form-control" type="number" name="quantity" value="1" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary add-to-cart-btn" type="submit">В корзину</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{include file="./navigation.tpl"}
    
<script>
    document.addEventListener('submit', function (event) {
        if (event.target.classList.contains('add-to-cart-form')) {
            event.preventDefault();
            var form = event.target;
            var product_id = form.querySelector('input[name="product_id"]').value;
            var quantity = form.querySelector('input[name="quantity"]').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'cart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Обработка успешного ответа от сервера, если необходимо
                }
            };
            xhr.send('add_to_cart=1&product_id=' + encodeURIComponent(product_id) + '&quantity=' + encodeURIComponent(quantity));
        }
    });
</script>

<script>
	var allSectionsBlock = document.getElementById('allSectionsBlock');
	var products = document.getElementById('products');
	var productsList = document.getElementById('productsList');
	var allSectionsList = document.getElementById('allSectionsList');
	allSectionsList.classList.add('active');
	productsList.classList.add('active');
	allSectionsBlock.classList.add('show');
	products.classList.add('show');
</script>