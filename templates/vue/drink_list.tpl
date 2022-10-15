{literal}
<section id="templates-vue-drinks">

    <h3> {{subtitle}} </h3>
    <ul>
        <li v-for="drink in drinks">
            <span v-if="drink.ended == 1"> <strike>{{drink.title}} - {{drink.description}}</strike></span>
            <span v-else> {{drink.title}} - {{drink.description}} </span>

            <span v-if="task.ended == 0 && auth">
                <a data-id="{{drink.id}}" class="btn-delete" href="#">delete</a>
                <a data-id="{{drink.id}}" class="btn-complete" href="#">complete</a>
            </span>
        </li>
    </ul>
</section>
{/literal}