<?php
/**
 * Template Name: Prescription Details
 */
get_header();?>

<section class="about_bg">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
</section>

<div class="datatablepartts">
    <div class="container">     
        <div class="table-responsive">
    <table id="myTable" class="display customdatatable dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Old Ref No.</th>
                <th>New Ref No.</th>
                <th>Name</th>
                <th>Age</th>
                <th>Weight</th>
                <th>Medicine</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <?php
                    global $wpdb;
                    $all_posts = $wpdb->get_results("SELECT * from wp_prescription");
                        //print_r($all_posts);

                        foreach ($all_posts as $print) { ?>
                        <td><?php echo $print->patient_id;?></td>
                        <td><?php echo $print->Old_ref_no;?></td>
                        <td><?php echo $print->New_ref_no;?> </td>
                        <td><?php echo $print->Name;?></td>
                        <td><?php echo $print->Age;?></td>
                        <td><?php echo $print->Weight;?></td>
                        <td><?php echo $print->Medicine;?></td>
                        <td>
                            <a href="<?php echo get_bloginfo('url') ?>/prescription-details?update=<?php echo $print->patient_id;?>" class="editbutpat" id='uptsubmit'>Edit</a>

                            <a href="<?php echo get_bloginfo('url') ?>/prescription-details?delete=<?php echo $print->patient_id;?>" class="deletebutpat">Delete</a>    

                            <a href="#" class="previewbutpat">Preview</a>
                        </td>
            </tr>

                <?php }

                    //Delete data from Database ~~~~~~~
                    if(isset($_GET['delete'])){
                        global $wpdb;
                        $pid = $_GET['delete'];
                        $table = 'wp_prescription';
                        $delete_patient = $wpdb->query("DELETE FROM $table WHERE patient_id='$pid'");

                        if( $delete_patient ){
                            echo "<script>location.replace(window.location.host+'/prescription-details');</script>";
                        }else{
                            echo "Detail is not deleted.";
                        }                        
                    }


                    // Update / Edit Database ~~~~
                      if (isset($_GET['update'])) {
                        global $wpdb;
                        $upt_id = $_GET['update'];
                        $table = 'wp_prescription';
                        $result = $wpdb->get_results("SELECT * FROM $table WHERE patient_id='$upt_id'");
                        foreach($result as $print) {
                                $print->patient_id;
                                $print->Old_ref_no;
                                $print->New_ref_no;
                                $print->Name;
                                $print->Age;
                                $print->Weight;
                                $print->Medicine;
                            }
                                echo "
                    <div class='container'>
                        <form method='post' action=''>
                        <p>Patient ID : <b> $print->patient_id </b></p>
                            <input type='text' placeholder='Old Ref. No' class='form-control' name='old_ref_no' value='$print->Old_ref_no'>
                            <input type='text' placeholder='New Ref. No' class='form-control' name='new_ref_no' value='$print->New_ref_no'>
                            <input type='text' placeholder='Patient Name' class='form-control' name='pname' value='$print->Name'>
                            <input type='text' placeholder='Age' class='form-control' name='age' value='$print->Age'>
                            <input type='text' placeholder='Weight' class='form-control' name='weight' value='$print->Weight'>
                            <input type='text' placeholder='Medicine' class='form-control' name='medicine' value='$print->Medicine'> 
                            <button type='submit' name='submit-prescription'>UPDATE</button>
                        </form>
                    </div>";
                      }
                          if (isset($_POST['uptsubmit'])) {
                              $id = $_POST['uptid'];
                              $name = $_POST['uptname'];
                              $email = $_POST['uptemail'];
                              $wpdb->query("UPDATE $table_name SET name='$name',email='$email' WHERE user_id='$id'");
                              
                              echo "<script>location.replace('admin.php?page=crud.php');</script>";
                            }                     
                    ?>
        </tbody>
    </table>
</div>
</div>
</div>
<?php get_footer(); ?>
