/* When the scratch full screen mode button is pressed, it calls this method */
/* So this simply adds and removes the editor class */
function JSsetPresentationMode(e) 
{
  if (Y.one('body').hasClass('editor'))
  {
    Y.one('body').removeClass("editor");    
  }
  else
  {
    Y.one('body').addClass("editor");
  }
}
