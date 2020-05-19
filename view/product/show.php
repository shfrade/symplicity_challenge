<?php $product = $data['products'][0]; ?>
<div class="">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Product Details</h2>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $product->getId(); ?></td>
                <td><?= $product->getName(); ?></td>
                <td><?= $product->getDescription(); ?></td>
                <td>
                    <img src="<?php echo($product->getImage() ? $product->getImage() : './assets/images/noimage.png') ?>"
                         class="list-img" alt="" id="img-foto"></td>
                <td><?php echo '$' . $product->getPrice(); ?></td>
                <td align="center"><?php echo $product->getCategoryName(); ?></td>
            </tr>
            </tbody>
        </table>
        <div class="row" style="float:right">
            <button type="button" class="btn btn-danger btn-form" onclick="history.back()">Back</button>
        </div>
    </div>
</div>