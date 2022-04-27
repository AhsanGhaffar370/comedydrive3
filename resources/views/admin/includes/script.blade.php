
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- bootstrap bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- custom js -->

<script src="{{ asset('admin_asset/js/my_validation.js') }}"></script>
<script src="{{ asset('admin_asset/js/icheck.min.js') }}"></script>
<script src="{{ asset('admin_asset/js/custom.js') }}"></script>


<!-- datepicker -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js" ></script>


<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


<script>

$(document).ready(function() {
    $('#cargo_table').DataTable({
        // "paging": false,
		// "pagingType":"full_numbers",
      //   "lengthMenu":[[5,10,25],[5,10,25]],
		"lengthMenu":[[10,25,50,100,-1],[10,25,50,100,'All']],
		responsive:true,
        type: 'date'
		// stateSave: true
	});
});


   $(document).ready(function(){
      $('.page-state').click(function(e){
         e.preventDefault();

         let status_val;
         let status= $(this).html();

         let href=$(this).attr('href');
         let id=href.split('/');

         let id_val=id[id.length - 1]

         // alert(id[id.length - 1]);
         if(status == "De-Activate"){
            status_val="0";
         }else{
            status_val="1";
         }

         $.ajax({
            url: href,
            data:"id=" + id_val + "&status=" + status_val,
            type: "get",
            success: function(res){
               if(res==0){
                  $('.page-status-'+id_val).html("Activate");
                  $('.page-status-'+id_val).attr("id","1");
                  $(".badge-"+id_val).html("In-Active");
                  // $(".badge-"+id_val).attr("class","badge badge-danger");
                  $(".badge-"+id_val).removeClass("badge-success");
                  $(".badge-"+id_val).addClass("badge-danger");
               }
               if(res==1){
                  $('.page-status-'+id_val).html("De-Activate");
                  $('.page-status-'+id_val).attr("id","0");
                  $(".badge-"+id_val).html("Active");
                  // $(".badge-"+id_val).attr("class","badge badge-success");
                  $(".badge-"+id_val).removeClass("badge-danger");
                  $(".badge-"+id_val).addClass("badge-success");
               }
            }
         });
      });
   });

</script>