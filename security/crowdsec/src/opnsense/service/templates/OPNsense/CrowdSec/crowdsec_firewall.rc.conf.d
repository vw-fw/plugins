# DO NOT EDIT THIS FILE -- Muro auto-generated file
{% if helpers.exists('Muro.crowdsec.general.firewall_bouncer_enabled') and Muro.crowdsec.general.firewall_bouncer_enabled|default("1") == "1" %}
crowdsec_firewall_enable="YES"
{% else %}
crowdsec_firewall_enable="NO"
{% endif %}
{% if helpers.exists('Muro.crowdsec.general.crowdsec_firewall_verbose') and Muro.crowdsec.general.crowdsec_firewall_verbose|default("0") == "1" %}
crowdsec_firewall_flags="-v"
{% else %}
crowdsec_firewall_flags=""
{% endif %}
