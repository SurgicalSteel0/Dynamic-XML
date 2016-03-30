{if isset($message)}

    {if $message['type'] eq 'success'}
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {$message['text']}
        </div>
    {/if}
    
    {if $message['type'] eq 'warning'}
        <div class="alert alert-warning fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {$message['text']}
        </div>
    {/if}
    
    {if $message['type'] eq 'danger'}
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {$message['text']}
        </div>
    {/if}

{/if}