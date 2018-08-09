// JavaScript Document
$(function(){
	
	var x=101,
	 r='<img src="../images/content/r.gif" height="auto" width="20px">',
	 c='<img src="../images/content/accept.png" height="auto" width="20px">';
	
	login=function(e){
		e.preventDefault();
		var pwd=$('#pwd').val(),
		usr=$('#usr').val(),
		url=$(this).closest('form').attr('action');
		$('#feedback').html('<center>'+r+'</center>');
		$.post(url,{'usr':usr,'pwd':pwd},function(data){
			if(data==x){
				window.location='index.php?q=cpanel';
			}else{
				$('div #feedback').html(data);
				}
			});
		
		}
	
	addmember=function(e){
		e.preventDefault();
		var name=$('#name').val(),
		tel=$('#tel').val(),
		pwd=$('#pwd').val(),
		sex=$('#sex').val(),
		addr=$('#addr').val(),
		dpt=$('#dpt').val(),
		role=$('#role').val(),
		url=$(this).closest('form').attr('action');
		//alert(name);
		
		$('#feedback').html('<center>'+r+' Creating Account...</center>');
		$.post(url,{'role':role,'name':name,'tel':tel,'pwd':pwd,'sex':sex,'addr':addr,'dpt':dpt},function(data){
			
				$('#feedback').html(data);		
			});
		
		}
	
	addcat=function(e){
		e.preventDefault();
		var cat=$('#cat').val(),
		url=$(this).closest('form').attr('action');
		//alert(name);
		
		$('#feedback').html('<center>'+r+'	Creating Category...</center>');
		$.post(url,{'cat':cat,'addid':1},function(data){
				if (data==x) {

					$('#feedback').html('<center>'+c+' Successfully Added A Category</center>');
				}else{

					$('#feedback').html(data);		

				}

			});	
		}

	pfile=function(event){
			event.preventDefault();
			var fdta=new FormData($('form:file')[0]);
			$.each($('#pfile')[0].files,function(i,file){
				fdta.append('file',file);
				});
				//fdta.serialize();
			
				$.ajax({
					url: '../resource/controller/fupload.php',
           			type: 'POST',
            		data: fdta,
					contentType:false,
					processData:false,
					cache:false,

					beforeSend:function(event){
						
							
						$('#feedback').html('<center>'+r+' Please Wait Your File is being Uploaded...</center>');
								
						},
					error:function(){
						alert('An Error Occured, Try Again');
						},
            		success: function (data) {
						if(data==x){
							$('#feedback').empty().html('<b>'+r+'&nbsp;<span style="color:green;">File Ready</span>:Waiting For Other Fields For Submission.</b>');
							
						}else{
							$('#feedback').html(data);
							}
					}
        			});
			}
			
	getsubclass=function(event){
		
		} 	
			
	
	
	searchusingplate=function(event){
		event.preventDefault();
		
		var plate=$(this).val(),
		url=$(this).closest('form').attr('action');
		
						
		$('dd').html('<center>'+r+'	Loading...</center>');
		$.post(url,{'plate':plate,'retrieveid':1},function(data){

//alert(data);
				if (data) {

					$('#templatemo_right cc').html('Loading...');
					
					$.post(url,{'id':data,'retrieveid':2},function(data){
						$('#templatemo_right cc').html(data);
					});		
					
					
					$.post(url,{'plate':plate,'retrieveid':3},function(data){
						$('dd').html(data);
					});			
						
				}else{

					$('#feedback').html(data);		

				}

			});
				
		}
		
	
	
	removefromshelf=function(){
		
		
		}
	
	iborrow=function(){
		bk=$(this).data('idr');
		
		
		}
	
	acceptrequest=function(){
		
		}


	declinerequest=function(){
		var id=$(this).data('drq');
		
		}

	returntolib=function(){
		
	
		}


/************************End Function*************************************/


/* **********************|Binders|****************************************** */
	
	$('#sblogin').bind('click',login);
	$('#pfile').bind('change',pfile);
	$('#plateid').bind('keyup',searchusingplate);
	//$('p > a').bind('click',opensubclass);
	//$('#addsubclass').bind('click',addsubclass);
	//$('#exploreshelf').bind('click submit',shelf);
	//$('#right cc').on('click','a',removefromshelf);
	//$('#callno').bind('keyup',searchusingcallno);
	//$('#right cc').on('click','#bwbk',iborrow);
	//$('#acprq').bind('click',acceptrequest);
	//$('#dcrrq').bind('click',declinerequest);
	//$('#delbr').bind('click',returntolib);
	
	
	
});