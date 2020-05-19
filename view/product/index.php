<script>
    $(document).ready(function() {
        $(".delete").click(function() {
            if (window.confirm("Confirm?")) {
                window.location = "index.php?product=destroy&id=" + this.dataset.value;
            }
        });
    });
</script>

<div class="">
    <?php
    // Messages errors by the type of it.
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'NOT_FOUND':
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> Product not found.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        }
    }
    // Messages of success
    if (isset($_GET['message'])) {
        switch ($_GET['message']) {
            case 'DELETE_SUCCESS':
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESS:</strong> The product has safely removed from the database.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
            case 'UPDATE_SUCCESS':
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESS:</strong> The product has been updated successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
            case 'CREATE_SUCCESS':
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESS:</strong> The product has been created successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        }
    }
    ?>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage Products</h2>
                </div>
                <div class="col-sm-6">
                    <a href="index.php?product=create" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $products = $data['products']; ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product->getId(); ?></td>
                        <td><a href="index.php?product=show&id=<?php echo $product->getId(); ?>"><?= $product->getName(); ?></a></td>
                        <td><img src="<?php echo ($product->getImage() ? $product->getImage() : './assets/images/noimage.png') ?>" class="list-img" alt=""></td>
                        <td><?php echo '$'.$product->getPrice(); ?></td>
                        <td><?php echo $product->getCategoryName(); ?></td>
                        <td>
                            <a href="index.php?product=edit&id=<?= $product->getId(); ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#" class="delete" data-value="<?= $product->getId() ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>