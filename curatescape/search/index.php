<?php 
$query = (isset($_GET['query']) ? $_GET['query'] : null);
$searchRecordTypes = get_search_record_types();
$title = __('Search Results for "%s"', $query);
$bodyclass ='browse queryresults';
$maptype='none';


echo head(array('maptype'=>$maptype,'title'=>$title,'bodyid'=>'search','bodyclass'=>$bodyclass)); 
?>


<div id="content">

<section class="search">	
	<h2><?php 
	$title .= ( $total_results  ? ': <span class="item-number">'.$total_results.'</span>' : '');
	echo $title; 
	?></h2>
		
	<div id="page-col-left">
		<aside>
		<!-- add left sidebar content here -->
		</aside>
	</div>


	<div id="primary" class="browse">
	<section id="results">
		<?php /*	
		<nav class="secondary-nav" id="item-browse"> 
			<?php echo mh_item_browse_subnav();?>
		</nav>
		
		<div class="pagination top"><?php echo pagination_links(); ?></div>
		*/
		?>
		<?php echo search_filters(); ?>
		
		<?php if ($total_results): ?>
		<?php /*
		<table id="search-results">
		    <thead>
		        <tr>
		            <th><?php echo __('Type');?></th>
		            <th><?php echo __('Title');?></th>
		        </tr>
		    </thead>
		    <tbody>
		        <?php foreach (loop('search_texts') as $searchText): ?>
		        <?php 
			        $type_label=str_replace(__('Item'),mh_item_label('singular'),$searchRecordTypes[$searchText['record_type']]);
			        $type_label=str_replace(__('Simple Page'),__('Page'),$searchRecordTypes[$searchText['record_type']]);
		        ?>
		        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
		        <tr class="<?php echo strtolower($searchText['record_type']);?>">
		            <td><?php echo $type_label; ?></td>
		            <td><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></td>
		        </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
		*/ ?>
		
			<?php foreach (loop('search_texts') as $searchText):
                $record_type = $searchText['record_type'];			
		        $record = get_record_by_id($record_type, $searchText['record_id']);
		        $titlelink = "<a href='"
                    .record_url($record, 'show')
                    ."'>"
                    .($searchText['title'] ? $searchText['title'] : '[Unknown]')
                    ."</a>";
		        $hasImage = false;
		        unset ($item_image);
		        if ($record_type == 'Item') {
	       	          $hasImage=metadata($record, 'has thumbnail');
			          if ($hasImage){
				       	preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', record_image($record, 'fullsize'), $result);
					   $item_image = array_pop($result);				
    			     }
		        }
		        
		        $index = 0; ?>
				<!-- <article class="item-result <?php echo $hasImage ? 'has-image' : null;?>" id="item-result-<?php echo $index;?>"> -->
				<article class="item-result <?php echo $hasImage ? 'has-image' : null;?>">
					<h3><?php echo $titlelink; ?></h3>
					<?php echo isset($item_image) ? link_to($record, 'show', '<span class="item-image" style="background-image:url('.$item_image.');"></span>') : null; ?>
					<?php 
					if ($searchText['record_type'] == 'Item'):
						$description = mh_the_text($record);
						if ($description): ?>
    						<div class="item-description">
    						<?php
    					   $output_desc = ws_rip_tags($description);
    					   if (strlen($output_desc) > 250) {
    						  $output_desc = substr($output_desc,0,250);

    							//trim off last word, since it may be a fragment
        						$last_space = strrpos($output_desc, ' ');
    	   					    if ($last_space) {
    		  					   $output_desc = substr($output_desc, 0, $last_space);
    						    }
    						     $output_desc .= "...";
    					   }
        				    echo $output_desc;
    					  ?>
						</div>
					<?php endif; ?>					
					
					
					<?php endif; ?>					
				</article>
			
		    <?php endforeach; ?>
		
		
		<?php else: ?>
		<div id="no-results">
		    <p><?php echo __('Your query returned no results.');?></p>
		</div>
		<?php endif; ?>


		<div class="pagination bottom"><?php echo pagination_links(); ?></div>
				
	</section>	
	</div><!-- end primary -->

</section>
</div> <!-- end content -->

<div id="share-this" class="browse">
<?php echo mh_share_this();?>
</div>

<?php echo foot(); ?>