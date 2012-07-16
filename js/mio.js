$(document).ready(function(){
   $("ul.lista").each(function(index,element){ 
        $(element).find("li").each(function(index2,element2){    
           if(index2>0) $(element2).hide();
         });
   });
   $("ul.lista").click(function(){
       var first = $(this).find("li:visible").last();
       $(first).next().show("fast");
        
   }); 
   ///XML
    $("p.code-xml").each(function(index,element){
       var codigo = $(element).html();
       var pre = '<script type="syntaxhighlighter" class="brush: xml;toolbar: false"><![CDATA[';
       var fin = ']]></script>';
       ///console.log(pre+codigo+fin);
       $(element).after(pre+codigo+fin);
    });
    
    //PHP
    $("p.code").each(function(index,element){
       var codigo = $(element).html();
       var pre = '<div class="send-console">Send</div><script type="syntaxhighlighter" class="brush: php;toolbar: false"><![CDATA[';
       var fin = ']]></script>';
       ///console.log(pre+codigo+fin);
       $(element).after(pre+codigo+fin);
    });
    
    //add button to send to wysiwyg code interpreter
    $(".send-console").click(function(){
        var code = $(this).prev();
        code = $('<a />').html(code).text();
        editAreaLoader.setValue("textarea_1", '<?php '+code);
        $("#code-php-button").click();
        //my_save("",'<?php '+code+'?>');
    });
    
    
     SyntaxHighlighter.all()
   
    
    
    
    $("#list-links").click(function(){
       $("#list-links-container").show(); 
    });
    $("#list-links-container a").click(function(){
        $("#list-links-container").hide(); 
    });
////editor    
    $("#code-php-button").click(function(){
       $("#code-php").show(); 
    });
    $("#hide-code").click(function(){
       $("#code-php").hide();
       
    });

    editAreaLoader.init({
	id : "textarea_1"		// textarea id
	,syntax: "php"			// syntax to be uses for highgliting
	//,start_highlight: true
        ,min_width: "670"
        ,min_height: "170"
        ,toolbar: " load, save , search, go_to_line, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
	,save_callback: "my_save"
        ,load_callback: "my_load"
        ,allow_resize: "x"
        ,display: "onload"
        ,start_highlight: true
    });
///fin editor    
    
});

function my_save(id , content){
    $.ajax({
        type: "POST",
        url: "ajax_save.php",
        data: {
            content: content
        }
    }).done(function( msg ) {
        $("#show_result").attr("src","/php_files/php_temp.php");
    });
    //console.log(content);
}
function my_load(id){
    $('#open_files').show().focus().click().hide();

}

