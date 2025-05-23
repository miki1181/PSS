{extends file="main.tpl"}


{block name="title"}Rejestracja{/block}

{block name="content"}
    <h1>Rejestracja</h1>

    {foreach $msgs->getMessages() as $msg}
        <div class="alert 
                    {if $msg->isInfo()}alert-success{/if}
                    {if $msg->isWarning()}alert-warning{/if}
                    {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}

    <form method="POST">
        <div class="mb-3">
        <label class="form-label">Email: <input type="email" name="email" value="{$email|escape}" class="form-control" required></label><br>
        </div>
        <div class="mb-3">
        <label class="form-label">Hasło: <input type="password" name="password" class="form-control" required></label><br>
        </div>
        <div class="mb-3">
        <label class="form-label">Powtórz hasło: <input type="password" name="confirm_password" class="form-control" required></label><br>
        </div>
        <button type="submit" class="btn btn-primary" >Zarejestruj się</button>
        
    </form>
{/block}