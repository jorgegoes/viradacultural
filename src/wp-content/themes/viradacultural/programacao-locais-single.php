<!-- .container-fluid -->

<?php get_header(); ?>
<div ng-controller="espaco">
    <div class="container-fluid container-menu-large">
        <section id="main-section" class="row">
            <article id="space-00" class="space-single">
                <header>
                    <h1>{{space.name}}</h1>
                </header>
                <img class="center-block" ng-src="{{conf.templateURL}}/img/virada-icon-2x.png">
                <div class="timeline clearfix">
                    <div class="event-group" ng-repeat="event in spaceEvents">
                        <div class="timeline-time">{{event.startsAt}}</div>
                        <article class="event clearfix event-grid">
                            <img ng-src="{{event.defaultImageThumb}}"/>
                            <div class="event-content clearfix">
                                <h1><a href="{{event.url}}">{{event.name}}</a></h1>
                                <a class="icon favorite favorite-event-{{event.id}}" ng-click="favorite(event.id)"><!--qdo selecionado adicionar classe 'active'--></a>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- .timeline -->
                <div class="servico col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <p>
                        <span><span>Endereço:</span> {{space.endereco}}<br></span>
                        <span><span>Telefone:</span> {{space.telefonePublico}}<br></span>
                        <span><span>Acessibilidade:</span> {{space.acessibilidade}}<br></span>
                    </p>
                                   
                    <iframe width="100%" height="220" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?hl=pt-BR&amp;geocode=&amp;q=Teatro Municipal, Praça Ramos de Azevedo, s/n - Republica São Paulo - SP 01037-010, Brasil&amp;sll=-23.545235,-46.638615&amp;ie=UTF8&amp;hq=Teatro Municipal, Praça Ramos de Azevedo, s/n - Republica São Paulo - SP 01037-010, Brasil&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=-23.545235,-46.638615&amp;z=17&amp;output=embed&amp;iwloc=near&amp;language=pt-BR&amp;region=br"></iframe>

                    <p>
                        <a class="btn btn-primary btn-xs" target="_blank" href="http://maps.google.com/maps?q=teatro municipal de sao paulo, Praça Ramos de Azevedo, s/n, São Paulo&hl=pt-BR&ll=-23.5451833,-46.6397523&z=17z">
                            <span class="icon icon_pin"></span> Ver no mapa
                        </a>
                    </p>
                </div>
            </article>
            <!-- .event-single -->
        </section>
        <!-- #main-section -->
        <?php get_footer(); ?>
    </div>
    <!-- .container-fluid -->
</div>
<?php html::part('countdown'); ?>
