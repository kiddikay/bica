<?php 

include '../../links/db.php';

$get_from_cart=mysqli_query($con, "SELECT * FROM cart WHERE sales_person='$usr' ");
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<th>items</th>";
                        echo "<th>quantity</th>";
                        echo "<th>price</th>";
                        echo "<th>option</th>";
                        while($row=mysqli_fetch_assoc($get_from_cart)){
                            $item=mysqli_real_escape_string($con, $row['item']);
                            echo "<tr>";
                            echo "<td>".$item."</td>";
                            echo "<td>".$row['quantity']."</td>";
                            echo "<td>N ".$row['price']."</td>";
                            echo "<td><a href='index.php?item=$item' class='btn btn-danger'><i class='fa fa-trash'></i> delete item</a></td>";
                            echo "</tr>";
                        }
                        $result=mysqli_query($con, "SELECT SUM(price) AS price_sum FROM cart WHERE sales_person='$usr' ");
                            $row=mysqli_fetch_assoc($result);
                            echo "<tr>";
                            echo "<th>TOTAL</th>";
                            echo "<td></td>";
                            echo "<td><b>N ".$sum=$row['price_sum']."</b></td>" ;
                            echo "</tr>";
                        echo "</table>";
                        
                        if(mysqli_num_rows($get_from_cart) < 1){
                        
                        }else{
                            $invoice=rand(111111, 999999);
                            echo "<a href='receipt.php?sales_person=$usr&invoice=$invoice' class='btn btn-success btn-block'>SELL</a>";
                        }
?>