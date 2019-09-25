/* Clicking the HTML button should retrieve the contents of the HTML text area
and use them to populate the preview pane. If no html is on the HTML Pane, it will post a message to ask you input HTML.
*/
function launch() {               
/*                var stylethis = document.getElementById("css"); */

                var text = document.getElementById("html").value;
                if (!(document.getElementById("html").value == "")) 
				{
					document.getElementById("PreviewPane").innerHTML = text;
				} 
	            else {
					window.alert("Please input some HTML on the HTML text area!");
				}                
  
            }

/*
Erase: Clicking the Erase button should reset the contents of both text areas and the
preview pane. Write your own JavaScript function for resetting the contents of both
text areas.
*/
  function ClearPane() {
    
                document.getElementById("PreviewPane").innerHTML="";
                document.getElementById("html").value="";
                document.getElementById("css").value="";
	  			document.getElementById("toggle").style.backgroundColor="lightseagreen";
               
            }
            
/*
CSS: Clicking the CSS button should toggle the contents of the CSS text area on and off.
This means to literally display the style in the CSS text area on the page or make the
styles take effect dynamically and also not display the CSS depending on the button click
*/

                
  function toggleStyle() {
                
               
                var stylenewcreate = document.getElementById("styles");
                
                if(!stylenewcreate.innerHTML){
					if(document.getElementById("css").value != ""){
                    stylenewcreate.innerHTML = document.getElementById("css").value; 
					document.getElementById("toggle").style.backgroundColor="brown";}
                }
                else
                    {
                        stylenewcreate.innerHTML = "";
						document.getElementById("toggle").style.backgroundColor="lightseagreen";
						
                    }
               
            }
            
            
            
 /*If you double click on the CSS text area, then the following default CSS will appear inside
the text area as a String of Text (Should be formatted nicely in order to be readable):
• h2 {color: #FF6F61; text-align: center;}
• p {font-family: helvetica; font-size: 20px; border: 2px solid red; border-radius: 12px;}    */

            function doubleclickcss(){
                var line1="h2 {color: #FF6F61; text-align: center;}";
				var line2="p {font-family: helvetica; font-size: 20px; border: 2px solid red; border-radius: 12px;}";
                document.getElementById("css").value=line1+"\n"+line2;
//                document.getElementById("css").innerHTML=line1+"\n\r"+line2;
            }
            
/*If you double click on the HTML text area, then the following default HTML will appear
inside the text area as a String of Text (Should also be formatted correctly):
• <h2> Welcome to my text editor!</h2>
• <p>You can test and create your own HTML and CSS in this text editor</p> */

            function doubleclickhtml(){
                var line1="<h2>Welcome to my text editor!</h2>"
				var line2="<p>You can test and create your own HTML and CSS in this text editor</p> ";
                document.getElementById("html").value=line1+"\n"+line2;
//                document.getElementById("html").innerHTML=line1+"\n\r"+line2;
				
            }
            
/*

If you click H4 twice, a prompt will appear and ask the user what they would like to
change the title of the webpage to. What the user enters will be displayed in the H1
and the title tag which will display at the top of the page and the top of the browser in
the tab, respectively.

*/
            function doubleclickfooter(){
                var pbox = prompt("Please Enter the new Title","New Title");
                document.title=pbox;
				document.getElementById("header").innerHTML = pbox;

            }
            
            
            