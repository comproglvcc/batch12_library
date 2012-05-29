<?php

  include 'SearchUtils.php';
          if(isset($_POST['submit'])){
               $key = $_POST['key'];
               $field = $_POST['field'];
               $result = SearchUtils::searchOnBook($key, $field);
          }


?>

<html>

        <head> 
         <link type="text/css" rel="stylesheet" href="css/styles.css" />
        	<script type="text/javascript" src="js/jquery.min.js"></script>
        	<script type="text/javascript" src="js/jquery.pajinate.js"></script>
        		
                                  <script type="text/javascript">
                                  $(document).ready(function(){
                                  	$('#pager').pajinate({
        					num_page_links_to_display :6,
        					items_per_page :10
        				});
        			    });


        		            </script>

         </head>
         


      <form method = 'post' action = "<?php echo $_SERVER['PHP_SELF'];?>">
            Search for : <input type= 'text' name = 'key' id = 'key'/>
            on <select name = 'field'>
                       <option value = 'book_title'> Book Title</option>
                       <option value = 'copyright'> Copyright</option>
                       <option value = 'publisher'> Publisher</option>
                       <option value = 'page_number'> Page Number</option>
                       <option value = 'description'> Description</option>
                       <option value = 'unit_price'> Unit Price</option>
                       <option value = 'location'> Location</option>
                       <option value = 'remaining_stock'> Stock Available</option>
            </select>
            <input type = 'submit' name = 'submit' value = 'submit'/>
      </form>


      <hr>
                <?php if(isset($_POST['submit'])):?>
                     <div id="pager" class="container">

				<h2>Book Search : </h2>

				<div class="page_navigation" ></div>
				
				<ul class="content">
				<table>
				<?php foreach($result as $key): ?>
				<p><?php echo $key['book_title'];?>
                                               <span><?php echo $key['copyright'];?><span></p>
				</div>
				<?php endforeach; ?>

                                </table>
				</ul>

			</div>

		</div>
               <?php endif;?>
                <script>
			$(document).ready(function(){
				$('p:odd, .content > *:odd').css('background-color','#FFD9BF');
			});
		</script>
</html>