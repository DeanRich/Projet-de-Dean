<div id="footer">
	Copyright © 2018 Dean RICHARDS.All Rights Reserved.
</div>

<script type="text/javascript">

    contextMenuCatch = {

    ie: function(){

        if( document.all ){

            return false;

        }

    },

    netscape: function(e){

        if( document.layers || (document.getElementById && !document.all) ){

            if( e.which == 2 || e.which == 3 ){

                return false;

            }

        }

    }

}

if (document.layers) {

    document.captureEvents(Event.mousedown);

    document.onmousedown = contextMenuCatch.netscape;

} else {

    document.onmouseup = contextMenuCatch.netscape;

    document.oncontextmenu = contextMenuCatch.ie;

}

document.oncontextmenu = new Function("return false");

document.onselectstart = new Function("return false");

 

</script>