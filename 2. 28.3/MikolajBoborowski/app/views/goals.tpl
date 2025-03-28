{extends file="main.tpl"}

{block name="title"}Cele Oszczędnościowe{/block}

{block name="content"}
    <h1>Cele Oszczędnościowe</h1>

    {foreach $msgs->getMessages() as $msg}
        <div class="alert 
                    {if $msg->isInfo()}alert-success{/if}
                    {if $msg->isWarning()}alert-warning{/if}
                    {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}

    <form method="POST" class="mb-4">
        <h3>Dodaj nowy cel</h3>
        <div class="mb-3">
            <label for="goal_name" class="form-label">Nazwa celu</label>
            <input type="text" id="goal_name" name="goal_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="target_amount" class="form-label">Kwota docelowa</label>
            <input type="number" id="target_amount" name="target_amount" class="form-control" step="1" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Termin</label>
            <input type="date" id="deadline" name="deadline" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Dodaj cel</button>
    </form>

    <h3>Twoje cele</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kwota docelowa</th>
                <th>Aktualna kwota</th>
                <th>Termin</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            {foreach $goals as $goal}
                <tr>
                    <td>{$goal.nazwa_celu|escape}</td>
                    <td>{$goal.kwota_docelowa|number_format:2} zł</td>
                    <td>{$goal.aktualna_kwota|number_format:2} zł</td>
                    <td>{$goal.termin|date_format:"%Y-%m-%d"}</td>
                    <td>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="goal_id" value="{$goal.id}">
                            <div class="input-group">
                                <input type="number" name="amount" class="form-control" placeholder="Kwota" step="1" required>
                                <button type="submit" class="btn btn-success">Wpłać</button>
                            </div>
                        </form>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/block}
