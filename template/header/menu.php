



<nav>
   <div id="menu" class="collapse navbar-collapse">
    <ul>
    	<?php 
    	 
    	 $query = mysqli_query($connect,"SELECT * FROM category ORDER BY cat_id ASC");
    	 while ($row_cat = mysqli_fetch_array($query)) {
											# code...
										

										

    	 ?>
        <li class="menu-item"><a href="index.php?template=category&cat_id=<?php echo $row_cat['cat_id']; ?>"><?php echo $row_cat['cat_name']; ?></a></li>
        <?php }
         ?>
    </ul>
</div>
</nav>