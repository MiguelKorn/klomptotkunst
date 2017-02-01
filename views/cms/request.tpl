<div id="request">
    <table id="requests">
        <section>
            {foreach from=$result item=oneItem}
                <p>{$oneItem.requestId}</p> <form method="post"><input type="button">Accept<input type="button">Decline</form>
                <p>{$oneItem.requestName}</p>
                <p>{$oneItem.requestDate}</p>
                {/foreach}
        </section>

    </table>
</div>