{% if not helpers.empty('Muro.DynDNS.general.enabled') and Muro.DynDNS.general.backend == 'ddclient' %}
ddclient_enable="YES"
ddclient_flags="-daemon {{Muro.DynDNS.general.daemon_delay|default('300')}}"
{% else %}
ddclient_enable="NO"
{% endif %}
