{if isset($message)}

    {if $message eq 'USER_SETTINGS_UPDATED'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Settings Updated</strong><br/>Your personal settings have been saved.
        </div>
    {/if}

    {if $message eq 'CAP_UPDATED'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Cap Updated</strong><br/>Cap colors have been updated successfully.
        </div>
    {/if}

    {if $message eq 'GOWN_UPDATED'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Gown Updated</strong><br/>Gown colors have been updated successfully.
        </div>
    {/if}

    {if $message eq 'TASSEL_UPDATED'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Tassel Updated</strong><br/>Tassel colors have been updated successfully.
        </div>
    {/if}

    {if $message eq 'CAP_ADDED'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Cap Color Added</strong><br/>A new cap color has been added successfully.
        </div>
    {/if}

    {if $message eq 'GOWN_ADDED'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Gown Color Added</strong><br/>A new gown color has been added successfully.
        </div>
    {/if}

    {if $message eq 'TASSEL_ADDED'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Tassel Color Added</strong><br/>A new tassel color has been added successfully.
        </div>
    {/if}

    {if $message eq 'CAP_UPDATE_FAILED'}
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Cap Not Updated</strong><br/>There was an error updating the cap colors. Please contact IT for support.
        </div>
    {/if}

    {if $message eq 'USER_SETTINGS_NOT_UPDATED'}
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Settings Not Updated</strong><br/>There was an error updating your personal settings. Please contact IT for support.
        </div>
    {/if}

{/if}