<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Contacts</title>
        <style type="text/css">
            table.contacts {
                width: 100%;
            }
            
            table.contacts thead {
                background-color: #eee;
                text-align: left;
            }
            
            table.contacts thead th {
                border: solid 1px #fff;
                padding: 3px;
            }
            
            table.contacts tbody td {
                border: solid 1px #eee;
                padding: 3px;
            }
            
            a, a:hover, a:active, a:visited {
                color: blue;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div><a href="index.php?op=new">Add new contact</a></div>
        <table class="contacts" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><a href="?orderby=name">Name</a></th>
                    <th><a href="?orderby=phone">Phone</a></th>
                    <th><a href="?orderby=email">Email</a></th>
                    <th><a href="?orderby=address">Address</a></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><a href="index.php?op=show&id=<?php print $contact->id; ?>"><?php print htmlentities($contact->name); ?></a></td>
                    <td><input type="text" name="nm" id="nmm" value="<?php print htmlentities($contact->phone); ?>"></td>
                    <td><?php print htmlentities($contact->email); ?></td>
                    <td><?php print htmlentities($contact->address); ?></td>
                    <td><a href="index.php?op=delete&id=<?php print $contact->id; ?>">delete</a></td>
                    <td><a href="index.php?op=update&id=<?php print $contact->id; ?>&name=<?php print $contact->name; ?>
                        &address=<?php print $contact->address; ?>&email=<?php print $contact->email; ?>&phone= 'nmm.value' " >update</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <script type="text/javascript"> 
            function append_link() { 
                var url_param = document.getElementById('nmm'); 
                var target_link = document.getElementById('target_link'); 
 
                if ( ! url_param.value ) { 
                    return false;   
                } 
 
                target_link.href = target_link.href + '/=url_param?' + escape(url_param.value); 
            } 
</script>
    </body>
</html>
