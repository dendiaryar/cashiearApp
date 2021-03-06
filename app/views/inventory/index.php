<div class="content">
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd;">
        <a class="navbar-brand ">Inventory</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
            <i class="fas fa-plus"></i>
        </button>
    </nav>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" method="POST" action="<?= BASEURL ?>public/inventory/search">
            <input name="searchProduct" class="form-control mr-sm-2" type="search" placeholder="Search By Id or Name" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    <table id="myTable" class="table table-bordered mt-5" style="width: 100%;  table-layout:fixed;">
        <thead>
            <tr>
                <th style="width: 10%;">No</th>
                <th style="width: 25%; ">Item name</th>
                <th style="width: 15% ">Quantity</th>
                <th style="width: 15%">Sell price(Per Item)</th>
                <th style="width: 15% ">Buy Cost(per item)</th>
                <th style="width: 20%;">Action </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = 0;
            $batas = 4;
            $halaman = $data['halaman'];
            $halaman_awal = $data['halaman_awal'];
            $total_halaman = ceil($data['dataRange'] / $batas);
            $previous = $halaman - 1;
            $next = $halaman + 1;
            foreach ($data['inventory'] as $product) :
            ?>
                <tr>
                    <td scope="row"><?= $id ?></td>
                    <td><?= $product['P_name'] ?></td>
                    <td><?= $product['P_stock'] ?></td>
                    <td><?= $product['P_sell'] ?></td>
                    <td><?= $product['P_price'] ?></td>
                    <td class="justify-content-between">
                        <button class=" btn btn-md btn-success" data-toggle="modal" data-target="#formEditModal<?= $id ?>">Edit</button>
                        <button class=" btn btn-md btn-danger" data-toggle="modal" data-target="#formDetailModal<?= $id ?>">
                            Detail</button>
                    </td>
                </tr>

                <!-- Modal For Edit-->
                <div class="modal fade" id="formEditModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="formEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="<?= BASEURL; ?>public/inventory/edit/<?= $product['P_Id'] ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="pname">Product Name</label>
                                        <input type="text" value="<?= $product['P_name'] ?>" class="form-control" id="pname" name="P_name" placeholder="nama produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="mfdate">Manufacture Date</label>
                                        <input type="date" value="<?= $product['P_mfdate'] ?>" class="form-control" id="mfdate" name="P_mfdate" placeholder="Manufacture date">
                                    </div>
                                    <div class="form-group">
                                        <label for="expdate">Expire Date</label>
                                        <input type="date" value="<?= $product['P_expdate'] ?>" class="form-control" id="expdate" name="P_expdate" placeholder="Exp date">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" value="<?= $product['P_price'] ?>" class="form-control" id="price" name="price" placeholder="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="splier">Supplier</label>
                                        <input type="text" value="<?= $product['P_suplier'] ?>" class="form-control" id="splier" name="P_suplier" placeholder="Suplier name">
                                    </div>
                                    <div class="form-group">
                                        <label for="sellp">Sell price</label>
                                        <input type="number" value="<?= $product['P_sell'] ?>" class="form-control" id="sellp" name="P_sell" placeholder="sell price">
                                    </div>
                                    <div class="form-group">
                                        <label for="sellp">Stock</label>
                                        <input type="number" value="<?= $product['P_stock'] ?>" class="form-control" id="pstock" name="P_stock" placeholder="Stock">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" href="<?= BASEURL; ?>public/inventory/delete/<?= $product['P_Id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data Produk Ini?')">Delete</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Modal for detail -->

                <div class="modal fade" id="formDetailModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="formDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data produk <?= $product['P_name'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="pname">Product Name</label>
                                    <input readonly type="text" value="<?= $product['P_name'] ?>" class="form-control" id="pname" name="P_name" placeholder="nama produk">
                                </div>
                                <div class="form-group">
                                    <label for="mfdate">Manufacture Date</label>
                                    <input readonly type="date" value="<?= $product['P_mfdate'] ?>" class="form-control" id="mfdate" name="P_mfdate" placeholder="Manufacture date">
                                </div>
                                <div class="form-group">
                                    <label for="expdate">Expire Date</label>
                                    <input readonly type="date" value="<?= $product['P_expdate'] ?>" class="form-control" id="expdate" name="P_expdate" placeholder="Exp date">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input readonly type="number" value="<?= $product['P_price'] ?>" class="form-control" id="price" name="price" placeholder="price">
                                </div>
                                <div class="form-group">
                                    <label for="splier">Supplier</label>
                                    <input readonly type="text" value="<?= $product['P_suplier'] ?>" class="form-control" id="splier" name="P_suplier" placeholder="Suplier name">
                                </div>
                                <div class="form-group">
                                    <label for="sellp">Sell price</label>
                                    <input readonly type="number" value="<?= $product['P_sell'] ?>" class="form-control" id="sellp" name="P_sell" placeholder="sell price">
                                </div>
                                <div class="form-group">
                                    <label for="sellp">Stock</label>
                                    <input readonly type="number" value="<?= $product['P_stock'] ?>" class="form-control" id="pstock" name="P_stock" placeholder="Stock">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            <?php
                $id += 1;
            endforeach;
            ?>
        </tbody>
    </table>

  <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href=".BASEURL."public/inventory/index/$previous"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="<?php echo BASEURL."public/inventory/index/$x" ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href=".BASEURL."public/inventory/index/$next"; } ?>>Next</a>
				</li>
			</ul>
		</nav>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan item baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= BASEURL; ?>public/inventory/tambah" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pname">Product Name</label>
                            <input type="text" class="form-control" id="pname" name="P_name" placeholder="nama produk">

                        </div>
                        <div class="form-group">
                            <label for="mfdate">Manufacture Date</label>
                            <input type="date" class="form-control" id="mfdate" name="P_mfdate" placeholder="Manufacture date">
                        </div>
                        <div class="form-group">
                            <label for="expdate">Expire Date</label>
                            <input type="date" class="form-control" id="expdate" name="P_expdate" placeholder="Exp date">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="price">
                        </div>
                        <div class="form-group">
                            <label for="splier">Supplier</label>
                            <input type="text" class="form-control" id="splier" name="P_suplier" placeholder="Suplier name">
                        </div>
                        <div class="form-group">
                            <label for="sellp">Sell price</label>
                            <input type="number" class="form-control" id="sellp" name="P_sell" placeholder="sell price">
                        </div>
                        <div class="form-group">
                            <label for="sellp">Stock</label>
                            <input type="number" class="form-control" id="pstock" name="P_stock" placeholder="Stock">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>