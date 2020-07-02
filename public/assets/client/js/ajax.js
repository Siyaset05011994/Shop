//---------------------------- Reset Button ---------------------------------
"use strict",
function PageReset(){
	window.location.reload();
}

//----------- contact section (Property-details and agents-details page) -------------

function ckhformcontact(){
	if(document.getElementById("name").value==''){
		alert("Please Enter Your Name"); 
		document.getElementById("name").value='';
		document.getElementById("name").on("focus");
		return false;
	}
	if(document.getElementById("email").value==''){
		alert("Please Enter Your Email"); 
		document.getElementById("email").value='';
		document.getElementById("email").on("focus");
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("email").value))	
	{
		document.getElementById("email").on("click");
		document.getElementById("email").on("focus");
		return false;
	}
	if(document.getElementById("phone").value==''){
		alert("Please Enter Your Phone Number"); 
		document.getElementById("phone").value='';
		document.getElementById("phone").on("focus");
		return false;
	}
	if(document.getElementById("message").value==''){
		alert("Please Enter Your Message"); 
		document.getElementById("message").value='';
		document.getElementById("message").on("focus");
		return false;
	}
    return true;
}
function ajaxmailcontact(){
	if(ckhformcontact() == true){
	var form_data = $('#contactForm').serialize();
		$.ajax({
		url:"php/mailcontroller.php?mode=contact",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
			$('#model2').on("click");
			$('#contactForm')[0].reset();
			}else if(data==0){
			alert('Please Enter Contact Name')
			document.getElementById("name").on("focus");
			}else if(data==2){
			alert('Please Enter Email Address')
			document.getElementById("email").on("focus");
			}else if(data==3){
			alert('Please Enter Valid Email Address')
			document.getElementById("email").on("focus");
			}else if(data==4){
			alert('Please Enter Phone Number')
			document.getElementById("phone").on("focus");
			}else if(data==5){
			alert('Please Enter Message')
			document.getElementById("message").on("focus");
			}
		}
		});
	}
}
//---------------------------- subscriber section ------------------------------

function ckhformsubscribe(){
	if(document.getElementById("subsemail").value==''){
		alert("Please Enter Your Email Address"); 
		document.getElementById("subsemail").value='';
		document.getElementById("subsemail").on("focus");
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("subsemail").value))	
	{
		document.getElementById("subsemail").on("click");
		document.getElementById("subsemail").on("focus");
		return false;
	}
    return true;
}

function ajaxmailsubscribe(){
	
if(ckhformsubscribe() == true){
	//alert(2);
	var form_data=$('#subsForm').serialize();
	//alert(form_data);
		 $.ajax({
		url:"php/mailcontroller.php?mode=subscriber",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
			$('#model2').on("click");
			$('#subsForm')[0].reset();
			}else if(data==0){
			alert('Please Enter Subscription Email')
			document.getElementById("subsemail").on("focus");
			$('#subsForm')[0].reset();	
			}else if(data==2){
			alert('Please Enter Valid Email Address')
			document.getElementById("subsemail").on("focus");
			$('#subsForm')[0].reset();	
			}
		}
		});
}
}


//----------- contact section (contact page) -------------

function ckhformcontactus(){
	if(document.getElementById("name").value==''){
		alert("Please Enter Your Name"); 
		document.getElementById("name").value='';
		document.getElementById("name").on("focus");
		return false;
	}
	if(document.getElementById("email").value==''){
		alert("Please Enter Your Email"); 
		document.getElementById("email").value='';
		document.getElementById("email").on("focus");
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("email").value))	
	{
		document.getElementById("email").on("click");
		document.getElementById("email").on("focus");
		return false;
	}
	if(document.getElementById("comment").value==''){
		alert("Please Enter Your Comment"); 
		document.getElementById("comment").value='';
		document.getElementById("comment").on("focus");
		return false;
	}
    return true;
}

function ajaxmailcontactus(){
	
	if(ckhformcontactus() == true){
			
	var form_data = $('#contactusForm').serialize();
	
		$.ajax({
		url:"php/mailcontroller.php?mode=contact_us",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
			$('#model2').on("click");
			$('#contactusForm')[0].reset();
			}else if(data==0){
			alert('Please Enter Contact Name')
			document.getElementById("name").on("focus");
			}else if(data==2){
			alert('Please Enter Email Address')
			document.getElementById("email").on("focus");
			}else if(data==3){
			alert('Please Enter Valid Email Address')
			document.getElementById("email").on("focus");
			}else if(data==5){
			alert('Please Enter Comment')
			document.getElementById("comment").on("focus");
			}
		}
		});
		
	}
}


//---------------------------- Search (faq page) section ------------------------------

function ckhformsearch(){
	if(document.getElementById("search_topic").value==''){
		alert("Please Enter Search Topic"); 
		document.getElementById("search_topic").value='';
		document.getElementById("search_topic").on("focus");
		return false;
	}
	
    return true;
}

function ajaxsearchtopic(){
	
if(ckhformsearch() == true){
	//code for submit form and search;
	document.getElementById("searchTopicFaq").reset();
}
}

//----------- login section (login page) -------------

function ckhformlogin(){
	
	if(document.getElementById("username").value==''){
		alert("Please Enter Your Username Or Email Id"); 
		document.getElementById("username").value='';
		document.getElementById("username").on("focus");
		return false;
	}
	if(document.getElementById("user_password").value==''){
		alert("Please Enter Your Password"); 
		document.getElementById("user_password").value='';
		document.getElementById("user_password").on("focus");
		return false;
	}
    return true;
}
function ajaxuserlogin(){
	if(ckhformlogin() == true){
	//code for submit form and redirect;
	document.getElementById("loginForm").reset();
	}
}
//---------------------------- registration form ------------------------------
function ckhregisterform(){
	if(document.getElementById("username").value==''){
		alert("Please Enter User Name"); 
		document.getElementById("username").value='';
		document.getElementById("username").on("focus");
		return false;
	}
	if(document.getElementById("phone").value==''){
		alert("Please Enter Your Phone No."); 
		document.getElementById("phone").value='';
		document.getElementById("phone").on("focus");
		return false;
	}
	if(document.getElementById("email").value==''){
		alert("Please Enter Your Email"); 
		document.getElementById("email").value='';
		document.getElementById("email").on("focus");
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("email").value))	
	{
		document.getElementById("email").on("click");
		document.getElementById("email").on("focus");
		return false;
	}
	if(document.getElementById("user_password").value==''){
		alert("Please Enter Your Password"); 
		document.getElementById("user_password").value='';
		document.getElementById("user_password").on("focus");
		return false;
	}
	if(document.getElementById("retype_password").value==''){
		alert("Please Retype Your Password"); 
		document.getElementById("retype_password").value='';
		document.getElementById("retype_password").on("focus");
		return false;
	}
	if(document.getElementById("retype_password").value!=''){
		if(document.getElementById("retype_password").value!=document.getElementById("user_password").value) {
			alert("Password Do Not Match");
			document.getElementById("retype_password").value='';
			document.getElementById("retype_password").on("focus");
			return false;
		}
	}
	
    return true;
}
function ajaxmailregister(){
if(ckhregisterform() == true){
	//alert(email);
	var form_data=$('#registerForm').serialize();
		 $.ajax({
		url:"php/mailcontroller.php?mode=registrationForm",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
			$('#model2').on("click");
			$('#registerForm')[0].reset();
			}else if(data==0){
			alert('Please Enter User Name')
			document.getElementById("username").on("focus");
			}
			else if(data==2){
			alert('Please Enter Phone Number')
			document.getElementById("phone").on("focus");
			}
			else if(data==3){
			alert('Please Enter Email Address')
			document.getElementById("email").on("focus");
			}
			else if(data==4){
			alert('Please Enter Valid Email Address')
			document.getElementById("email").on("focus");
			}
			else if(data==5){
			alert('Please Enter Password')
			document.getElementById("user_password").on("focus");
			}
			else if(data==6){
			alert('Please Retype Password')
			document.getElementById("retype_password").on("focus");
			}
			else if(data==7){
			alert('Password Do Not Match')
			document.getElementById("retype_password").on("focus");
			}
		}
		});
}
}
//----------- comment section (blog detail page) -------------
function ckhformblogcomments(){
	if(document.getElementById("name").value==''){
		alert("Please Enter Your Name"); 
		document.getElementById("name").value='';
		document.getElementById("name").on("focus");
		return false;
	}
	if(document.getElementById("email").value==''){
		alert("Please Enter Your Email"); 
		document.getElementById("email").value='';
		document.getElementById("email").on("focus");
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("email").value))	
	{
		document.getElementById("email").on("click");
		document.getElementById("email").on("focus");
		return false;
	}
	if(document.getElementById("comment").value==''){
		alert("Please Enter Your Comment"); 
		document.getElementById("comment").value='';
		document.getElementById("comment").on("focus");
		return false;
	}
    return true;
}
function ajaxblogcomment(){
	if(ckhformblogcomments() == true){
	//some code for submit form and redirect;
	document.getElementById("blogCommentForm").reset();
	}
}
//---------------- Profile update (my-account page) section ---------------
function ckhprofileinfoform(){
	if(document.getElementById("name").value==''){
		alert("Please Enter Your Full Name"); 
		document.getElementById("name").value='';
		document.getElementById("name").on("focus");
		return false;
	}
	if(document.getElementById("username").value==''){
		alert("Please Enter Username"); 
		document.getElementById("username").value='';
		document.getElementById("username").on("focus");
		return false;
	}
	if(document.getElementById("email").value==''){
		alert("Please Enter Your Email"); 
		document.getElementById("email").value='';
		document.getElementById("email").on("focus");
		return false;
	}
	if(!validateEmail("Email Address",document.getElementById("email").value))	
	{
		document.getElementById("email").on("click");
		document.getElementById("email").on("focus");
		return false;
	}
	if(document.getElementById("mobile_number").value==''){
		alert("Please Enter Your Mobile No."); 
		document.getElementById("mobile_number").value='';
		document.getElementById("mobile_number").on("focus");
		return false;
	}
    return true;
}
function ajaxprofileinfo(){
if(ckhprofileinfoform() == true){
	//alert(email);
	var form_data=$('#profileForm').serialize();
		 $.ajax({
		url:"php/mailcontroller.php?mode=profileinfoForm",
		data:form_data,
		cache:false,
		async:false,
		success: function(data) {
			//alert(data);
			if(data==1){
			$('#model3').on("click");
			$('#profileForm')[0].reset();
			}
			else if(data==0){
			alert('Please Enter Your Full Name')
			document.getElementById("name").on("focus");
			}
			else if(data==2){
			alert('Please Enter Username')
			document.getElementById("username").on("focus");
			}
			else if(data==3){
			alert('Please Enter Email Address')
			document.getElementById("email").on("focus");
			}
			else if(data==4){
			alert('Please Enter Valid Email Address')
			document.getElementById("email").on("focus");
			}
			else if(data==5){
			alert('Please Enter Mobile Number')
			document.getElementById("mobile_number").on("focus");
			}
		}
		});
}
}
//---------------- property side bar filter ---------------
function searchfilter(){
	if(document.getElementById("keywords").value==''){
		alert("Please Enter Keywords"); 
		document.getElementById("keywords").value='';
		document.getElementById("keywords").on("focus");
		return false;
	}
	if(document.getElementById("property_type").value==''){
		alert("Please Enter Property Type");
		document.getElementById("property_type").value='';
		document.getElementById("property_type").on("focus");
		return false;
	}
	if(document.getElementById("min_bedroom").value==''){
		alert("Please Enter Min Bedroom"); 
		document.getElementById("min_bedroom").value='';
		document.getElementById("min_bedroom").on("focus");
		return false;
	}
	if(document.getElementById("max_bedroom").value==''){
		alert("Please Enter Max Bedroom"); 
		document.getElementById("max_bedroom").value='';
		document.getElementById("max_bedroom").on("focus");
		return false;
	}
	if(document.getElementById("min_bathroom").value==''){
		alert("Please Enter Min Bathroom"); 
		document.getElementById("min_bathroom").value='';
		document.getElementById("min_bathroom").on("focus");
		return false;
	}
	if(document.getElementById("max_bathroom").value==''){
		alert("Please Enter Max Bathroom"); 
		document.getElementById("max_bathroom").value='';
		document.getElementById("max_bathroom").on("focus");
		return false;
	}
	if(document.getElementById("min_area").value==''){
		alert("Please Enter Min Area"); 
		document.getElementById("min_area").value='';
		document.getElementById("min_area").on("focus");
		return false;
	}
	if(document.getElementById("max_area").value==''){
		alert("Please Enter Max Area"); 
		document.getElementById("max_area").value='';
		document.getElementById("max_area").on("focus");
		return false;
	}
    return true;
}
//---------------- home2 search filter ---------------
function homesearchfilter(){
	if(document.getElementById("keywords").value==''){
		alert("Please Enter Keywords"); 
		document.getElementById("keywords").value='';
		document.getElementById("keywords").on("focus");
		return false;
	}
	window.location.href='properties.html';
}

//---------------- add property form ---------------

function add_propertyform(){
	if(document.getElementById("property_title").value==''){
		alert("Please Enter Property Title");
		document.getElementById("property_title").value='';
		document.getElementById("property_title").on("focus");
		return false;
	}
	if(document.getElementById("property_price").value==''){
		alert("Please Enter Property Price");
		document.getElementById("property_price").value='';
		document.getElementById("property_price").on("focus");
		return false;
	}
	var proptype= document.getElementById("property_type").value;
	if (proptype == "") {
		alert("Please select Property Type");
		document.getElementById("property_type").on("focus");
		return false;
	}
	var propcity= document.getElementById("property_city").value;
	if (propcity == "") {
		alert("Please select City");
		document.getElementById("property_city").on("focus");
		return false;
	}
	if(document.getElementById("property_location").value==''){
		alert("Please Enter Property Location");
		document.getElementById("property_location").value='';
		document.getElementById("property_location").on("focus");
		return false;
	}
	if(document.getElementById("property_zip_code").value==''){
		alert("Please Enter Zip Code"); 
		document.getElementById("property_zip_code").value='';
		document.getElementById("property_zip_code").on("focus");
		return false;
	}
    return true;
}