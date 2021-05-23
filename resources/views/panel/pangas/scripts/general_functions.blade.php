<script>

    // ###-- EXPANDIBLE (HAMBURGUER MENU) --##
    function expandFunction(e,collapseMenu,father){

        if(typeof e !== 'undefined'){
            e.preventDefault();
        }

        if(document.getElementById(father).style.display === '' || document.getElementById(father).style.display === 'none'){
            var item = document.getElementById(father);                
            var items = document.getElementsByClassName(father);

            // item.style.opacity=1;
            for (var i=0; i < items.length; i++) {
                items[i].style.opacity=1;
            }

            document.getElementById(father).style.display='block';
        }else{
            var item = document.getElementById(father);                
            var items = document.getElementsByClassName(father);

            // item.style.opacity=0;
            for (var i=0; i < items.length; i++) {
                items[i].style.opacity=0;
            }

            document.getElementById(father).style.display='none';
        }

        let dropDown= document.getElementById(collapseMenu);
        
        var totalHeight = 0;
        $("#"+father).children().each(function(){
            totalHeight += $(this).outerHeight(true); // true = include margins
        });
        if(dropDown.style.height == '' || dropDown.style.height == '0px' ){
            dropDown.style.height= totalHeight + "px";
        }else{
            dropDown.style.height= '0px';
        }

        dropDown.classList.toggle('collapsed-active');
        dropDown.classList.toggle('display-block');
    }

    // ###-- ADD FISHING GEAR OR BOAT FEATURE --##
    function addItem(listName,candidateSelected) {
        document.getElementById('navbarSupportedContent41').style.height='auto'
        if(document.getElementById(candidateSelected).value === ''){
            alert('El campo no puede estar vacio');
        }else{
                var ul = document.getElementById(listName);
                var candidate = document.getElementById(candidateSelected);
                var input = document.createElement("input");
                input.setAttribute('value', candidate.value);
                input.setAttribute('id', candidate.value);
                input.setAttribute('name', listName+'[]');
                input.setAttribute('class', 'mb-1');
                input.appendChild(document.createTextNode(candidate.value));
                ul.appendChild(input);
                candidate.value='';
        }
    }

    // ###-- REMOVE FISHING GEAR OR BOAT FEATURE --##
    function removeItem(listName,candidateSelected) {

        var ul = document.getElementById(listName);
        var candidate = document.getElementById(candidateSelected);
        candidate.value= ul.lastChild.id;
        var item = document.getElementById(candidate.value);
        var lastItem=ul.lastChild.id;
        if(typeof lastItem === 'undefined' || typeof ul.lastChild === 'undefined'){
            candidate.value= '';
        }else{
            candidate.value= ul.lastChild.id;
            ul.removeChild(item);
        }

    }


</script>