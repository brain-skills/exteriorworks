<div class="row">
    <div class="col-12">
        <h1>Shopping Cart</h1>
        {if $cartContent}
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-end text-center" width="50px">ID</th>
                        <th class="border-end">Название</th>
                        <th class="border-end">Цена</th>
                        <th>Количество</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $cartContent as $product_id => $item}
                        <tr>
                            <td class="border-end text-center" width="50px">{$item.id}</td>
                            <td class="border-end">{$item.title}</td>
                            <td class="border-end" width="150px">{$item.price} .₽</td>
                            <td class="text-center" width="120px">{$item.quantity}</td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
            <p class="mb-0">Итого: {$totalPrice} .₽</p>
            <a href="index?checkout">Оплатить</a>
        {else}
            <p>Your shopping cart is empty.</p>
        {/if}
    </div>
</div>