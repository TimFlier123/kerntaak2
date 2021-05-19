<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

  <style>.saveButton,
[contenteditable] .editButton{
    display: none;
}

.editButton,
[contenteditable] .saveButton {
    display: inline; /* For IE */
    display: inline-block;
}

[contenteditable] {
    background: #ddddff;
}</style>
  <table id="elencoMezzi" class="itemList" width="100%">
    <thead>
    <tr>
        <th>
            Field 1
        </th>
        <th>
            Field 2
        </th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr data-id="1" class="displayRow">
        <td>
            Value 1.1
        </td>
        <td>
            Value 1.2
        </td>
        <td>
            <input type="button" value="edit" class="editButton" />
            <input type="button" value="save" class="saveButton" />
        </td>
    </tr>    
    <tr data-id="2" class="displayRow">
        <td>
            Value 2.1
        </td>
        <td>
            Value 2.2
        </td>
        <td>
            <input type="button" value="edit" class="editButton" />
            <input type="button" value="save" class="saveButton" />
        </td>
    </tr>  
    <tr data-id="3" class="displayRow">
        <td>
            Value 3.1
        </td>
        <td>
            Value 3.2
        </td>
        <td>
            <input type="button" value="edit" class="editButton" />
            <input type="button" value="save" class="saveButton" />
        </td>
    </tr>          
    </tbody>
</table>
<div id="editRowHolder" style="display:none;">
    <tr class="editRow">
        <td>
            <input type="text" name="field1" />
        </td>
        <td>
            <input type="text" name="field2" />
        </td>
        <td>
            <input type="button" value="save" class="saveButton" />
        </td>
    </tr>
</div>

<script>
$(function () {
    $( 'tr' ).each( function editAndSave( index, tr ){
        var $tr = $( tr );
        
        $tr.find( 'input[type=button]' ).on( 'click', function( e ){            
            var toggle = $( e.target ).is( '.editButton' );
            
            if( toggle ){
                $tr.attr( 'contenteditable', toggle );
            }
            else {
                $tr.removeAttr( 'contenteditable' );
            }
        } )
    });
});
</script>