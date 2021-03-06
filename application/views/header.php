<?php echo doctype('HTML 5'); ?>
<html>
	<head>
		<meta charset="utf-8">
		<?php echo link_tag('assets/css/metro.min.css'); ?>
		<?php echo link_tag('assets/css/metro-schemes.min.css'); ?>
		<?php echo link_tag('assets/css/metro-responsive.min.css'); ?>
		<?php echo link_tag('assets/css/metro-rtl.min.css'); ?>
		<?php echo link_tag('assets/css/metro-icons.min.css'); ?>
    <script type="text/javascript" src='assets/js/jquery-1.11.3.min.js'></script>
		<script type="text/javascript" src='assets/js/jquery.dataTables.min.js'></script>
		<script type="text/javascript" src='assets/js/dataTables.buttons.js'></script>
		<script type="text/javascript" src='assets/js/buttons.html5.min.js'></script>
		<script type="text/javascript" src='assets/js/jszip.min.js'></script>
		<script type="text/javascript" src='assets/js/pdfmake.min.js'></script>
		<script type="text/javascript" src='assets/js/vfs_fonts.js'></script>
		<script type="text/javascript" src='assets/js/buttons.html5.min.js'></script>
		<script type="text/javascript" src='assets/js/buttons.print.js'></script>
		<script type="text/javascript" src='assets/js/metro.min.js'></script>
		<script type="text/javascript" src='assets/js/dataTables.responsive.min.js'></script>
		<script type="text/javascript" src='assets/js/dataTables.select.min.js'></script>
		<script type="text/javascript">
			function showDialog(id, titre){
				var title = titre;
				$('.titleDialog').text(title);
				var dialog = $(id).data('dialog');
				dialog.open();
			}
		</script>
		<script type="text/javascript">

		  var save_method; //for save method string
		  var table;
		  $(document).ready(function() {
			table = $('#table').DataTable({

			  processing: true, //Feature control the processing indicator.
			  serverSide: true, //Feature control DataTables' server-side processing mode.
			  responsive:true,
			  paging:true,
			  select:true,
			  buttons: [
				  {
					  extend:'excelHtml5',
					  className: 'button primary',
				  },
				  {
					  extend:'csvHtml5',
					  className: 'button primary',
				  },
				  {
					  extend: 'pdfHtml5',
					  className: 'button primary',
					  download: 'open',
					  customize: function ( doc ) {
							doc.content.splice( 1, 0, {
								margin: [ 0, 0, 0, 12 ],
								alignment: 'center',
								image: 'data:image/png;base64,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',
							} );
						}
				  },
				  {
					  extend:'print',
					  text:'Impression',
					  className: 'button primary',
				  },


			  ],
			  // Load data for the table's content from an Ajax source
			  "ajax": {
				  "url": "<?php echo site_url('article/ajax_list')?>",
				  "type": "POST"
			  },

			  //Set column definition initialisation properties.
			  "columnDefs": [
			  {
				"targets": [ -1 ], //last column
				"orderable": false, //set not orderable
			  },
			  ],

			});
		  });

		  function add_person()
		  {
			save_method = 'add';
			$('#form')[0].reset(); // reset form on modals
			showDialog('#dialog', 'Ajout d\'un article'); // show modal
			
		  }

		  function edit_person(id)
		  {
			save_method = 'update';
			$('#form')[0].reset(); // reset form on modals
			//Ajax Load data from ajax
			$.ajax({
				url : "<?php echo site_url('article/ajax_edit/')?>/" + id,
				type: "GET",
				dataType: "JSON",

				success: function(data)
				{

					$('[name="id"]').val(data.id);
					$('[name="article"]').val(data.article);
					$('[name="sn"]').val(data.sn);
					$('[name="etat"]').val(data.etat);
					$('[name="emprunte"]').val(data.emprunte);


					showDialog('#dialog','Modification Article'); // show modal when complete loaded


				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});

		  }

		  function reload_table()
		  {
			table.ajax.reload(null,false); //reload datatable ajax
		  }

		  function save()
		  {
			var url;
			if(save_method == 'add')
			{
				url = "<?php echo site_url('article/ajax_add')?>";
			}
			else
			{
			  url = "<?php echo site_url('article/ajax_update')?>";
			}

			 // ajax adding data to database
				$.ajax({
				  url : url,
				  type: "POST",
				  data: $('#form').serialize(),
				  dataType: "JSON",
				  success: function(data)
				  {
					 //if success close modal and reload ajax table
					 $('#dialog').data('dialog').close();

					 $.Notify({
					    caption: 'Sauvegarde',
					    content: 'Les modifications sont sauvegardés',
						icon: "<span class='mif-floppy-disk'></span>",
						keepOpen: true
					});
					reload_table();
				  },
				  error: function (jqXHR, textStatus, errorThrown)
				  {
					  alert('Erreur Ajout / modification des données');
				  }
			  });
		  }

		  function delete_person(id)
		  {
			if(confirm('Etes vous sur de vouloir suprimmer cet article ?'))
			{
			  // ajax delete data to database
				$.ajax({
				  url : "<?php echo site_url('article/ajax_delete')?>/"+id,
				  type: "POST",
				  dataType: "JSON",
				  success: function(data)
				  {
					 //if success reload ajax table
					 $('#dialog').data('dialog').close();

					 $.Notify({
					    caption: 'Supression',
					    content: 'L\'article a bien été suprimé.',
						icon: "<span class='mif-floppy-disk'></span>",
						keepOpen: true
					});

					reload_table();
				  },
				  error: function (jqXHR, textStatus, errorThrown)
				  {
					  alert('Erreur de supression.');
				  }
			  });

			}
		  }

		</script>
		<title></title>
	</head>
