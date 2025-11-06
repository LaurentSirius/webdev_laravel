<footer>
    @php
        $label_home = 'home';
    @endphp
    <div class="flex flex--center column">
        <x-buttons.linkButton path="/pokemon" label="Liste des pokemon" />
        <x-buttons.linkButton path="/pokemon/details" label="Détail d'un pokemon" />
        <x-buttons.linkButton path="/" :label="$label_home" />
    </div>
</footer>


<style>
    footer {
        background-color: #2c3e50;
        color: white;
        padding: 1rem;
        text-align: center;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 200px;
        z-index: 1000;
    }

    a {
        color: whitesmoke;
    }
</style>
