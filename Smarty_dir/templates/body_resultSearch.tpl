 <br>
            {$message}
            <br>
            
	    <br>
	    <ul>
	    {if $numResults!=0}
	    {foreach $rows as $patient}
	    <li> {$patient.name} {$patient.surname} {$patient.cf} {$patient.dateBirth}
                <button><a href="index.php?control=manageDB&action=getChecks&p={$patient.link}">vai </a></button>
	    </li>
	    <br>
	    {/foreach}
	    </ul>
	    {/if}