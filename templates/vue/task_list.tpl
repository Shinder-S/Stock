{literal}
<section id="templates-vue-tasks">

    <h3> {{subtitle}} </h3>
    <ul>
        <li v-for="task in tasks">
            <span v-if="task.ended == 1"> <strike>{{task.title}} - {{task.description}}</strike></span>
            <span v-else> {{task.title}} - {{task.description}} </span>

            <span v-if="task.ended == 0 && auth">
                <a data-id="{{task.id}}" class="btn-delete" href="#">delete</a>
                <a data-id="{{task.id}}" class="btn-complete" href="#">complete</a>
            </span>
        </li>
    </ul>
</section>
{/literal}