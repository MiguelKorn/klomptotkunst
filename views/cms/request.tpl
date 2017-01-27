<div id="request">
    <table id="requests">
        <section>
            {foreach from=$result item=oneItem}
                <p>{$oneItem.requestId}</p>
                <p>{$oneItem.requestName}</p>
                <p>{$oneItem.requestDate}</p>
                {/foreach}

        </section>

    </table>
</div>