<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            if (window.confirm("Confirm?")) {
                window.location = "index.php?category=destroy&id=" + this.dataset.value;
            }
        });
    });
</script>
<div>
    <div>
        <?php
        // Messages errors by the type of it.
        if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case 'NOT_FOUND':
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> Category not found.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    break;
                case 'PRODUCTS':
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> The delete operation cannot be completed: this category still has some
                        products.
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
                        <strong>SUCCESS:</strong> The category has safely removed from the database.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    break;
                case 'UPDATE_SUCCESS':
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SUCCESS:</strong> The category has been updated successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    break;
                case 'CREATE_SUCCESS':
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SUCCESS:</strong> The category has been created successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    break;
            }
        }
        ?>

    </div>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage Categories</h2>
                </div>
                <div class="col-sm-6">
                    <a href="index.php?category=create" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                        <span>Add New Category</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th style="text-align: center;">Products</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $categories = $data['categories']; ?>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?php echo $category->getId(); ?></td>
                    <td>
                        <a href="index.php?category=show&id=<?php echo $category->getId(); ?>"><?= $category->getName(); ?></a>
                    </td>
                    <td align="center"><?php echo $category->getTotal(); ?></td>
                    <td>
                        <a href="index.php?category=edit&id=<?= $category->getId(); ?>" class="edit"><i
                                    class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#" class="delete" data-value="<?= $category->getId() ?>"><i class="material-icons"
                                                                                             data-toggle="tooltip"
                                                                                             title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>