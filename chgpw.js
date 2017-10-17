$(document).ready(function(){
	var pwval = 
	{
		'oldpw' : function() 
			{
				var ele = $('#oldpw');
				var pw = ele.val();
				if(ele.val().length<1)
				{
					pwval.errors = true;
					$('#oldpw').next().next('span').show();
				}
				else
				{
					$('#oldpw').next().next('span').hide();
					$.ajax({
					type:'POST',
					url:"chgpw.php",
					data:"pw="+pw,
					success: function(data)
					{
						if(data==1)
						{
							$('#oldpw').next().next('span').next('span').hide();
							$('#savepw').removeAttr('disabled');
						}
						else if(data==0)
						{
							pwval.errors = true;
							$('#oldpw').next().next('span').next('span').show();
							$('#savepw').attr('disabled','disabled');
						}
					}
				});
				}
			},
		'newpw' : function()
		{
			var ele = $('#newpw');
			var pele = $('#oldpw')
			if(ele.val().length<6)
			{
				pwval.errors = true;
				$('#newpw').next().next('span').show();
			}
			else
			{
				if (ele.val() == pele.val())
				{
					pwval.errors = true;
        			$('#newpw').next().next('span').next('span').show();
				}
				else
				{
					$('#newpw').next().next('span').next('span').hide();
					$('#newpw').next().next('span').hide();
				}
			}
		},
		'confpw' : function()
		{
			var ele = $('#confpw');
			var pele = $('#newpw');
			
			if(ele.val()==pele.val())
			{
				$('#confpw').next().next('span').hide();
			}
			else
			{
				pwval.errors = true;
				$('#confpw').next().next('span').show();
			}
		},
		'sendIt' : function()
		{
			if(!pwval.errors)
			{
				var parent = $("#savepw").closest("div").parent(".border").attr("id");
				var npw = $("#confpw").val();
				$.ajax({
					type:'POST',
					url:"chgpw.php",
					data:{npw:npw},
					success: function(data){
						if(data==1)
						{
							alert("Fail to save password. Please try again");
						}
						else if(data==0)
						{
							alert("New password saved.");
							window.location = 'userprofile.php';
						}
					}
				});
			}
		}
	};
	
	$("#savepw").click(function(e) {
        pwval.errors = false;
		pwval.oldpw();
		pwval.newpw();
		pwval.confpw();
		pwval.sendIt();
		return false;
    });
	
	$('#oldpw').change(pwval.oldpw);
	$('#newpw').change(pwval.newpw);
	$('#confpw').change(pwval.confpw);
	
	
	
});