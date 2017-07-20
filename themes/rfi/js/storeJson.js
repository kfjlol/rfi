function getStoreInfo(){
	lookupStore(document.getElementById("storeNum").value);
	$("#rm").attr("src","/wp-content/themes/rfi/js/storeimage_rm.php?storeNum="+document.getElementById("storeNum").value);
	$("#fm").attr("src","/wp-content/themes/rfi/js/storeimage_fm.php?storeNum="+document.getElementById("storeNum").value);
	
	}

function lookupStore(storeNum)
                {
                  $.ajax
                    (
                        {
                           url:"/wp-content/themes/rfi/js/getStore.php?storeNum="+storeNum,
                           success:function(data)
                           {
                           	var result = "<b>STORE NUMBER : </b>" + data.store.storenum + "<br>";
                           	result = result + "<b>STORE ADDRESS : </b>" + data.store.addr1 + "&nbsp;" + data.store.city + "&nbsp;" + data.store.state + "&nbsp;" + data.store.postalcode + "<br>";

				result = result + "<b>REGION : </b>" + data.store.region + "<br><br><br>";	
							    
                              	document.getElementById("storeInfo").innerHTML=result;
								document.getElementById("rmname").innerHTML="RM NAME : " + data.store.regionalmanager.name;
								document.getElementById("rmemail").innerHTML="RM EMAIL : " +"<a href=mailto:" +data.store.regionalmanager.email +">" +data.store.regionalmanager.email +"</a>";
								document.getElementById("rmphone").innerHTML="RM PHONE : " + data.store.regionalmanager.phone;
								document.getElementById("fmname").innerHTML="FM NAME : " + data.store.fieldmanager.name ;
								document.getElementById("fmemail").innerHTML="FM EMAIL : " +"<a href=mailto:" +data.store.fieldmanager.email +">" +data.store.fieldmanager.email +"</a>";
								document.getElementById("fmphone").innerHTML="FM PHONE : " + data.store.fieldmanager.phone;
                           },

                           error:function( jqXHR, textStatus, errorThrown)
                           {
                              alert( errorThrown);
                           },
                           complete:function(jqXHR, textStatus)
                           {
                           },
                            cache:false, async:true, dataType:"json",timeout:
                           45000
                         }
                    )
                }
