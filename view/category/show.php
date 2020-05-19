<?php $category = $data['categories'][0]; ?>
<div class="">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Category Details</h2>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Products</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $category->getId(); ?></td>
                <td><?= $category->getName(); ?></td>
                <td><?= $category->getDescription(); ?></td>
                <td><?= $category->getTotal(); ?></td>
            </tr>
            </tbody>
        </table>
        <div class="row" style="float:right">
            <button type="button" class="btn btn-danger btn-form" onclick="history.back()">Back</button>
        </div>
    </div>
</div>