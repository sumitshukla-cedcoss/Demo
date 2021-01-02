( function( api ) {

	// Extends our custom "law-firm-lite" section.
	api.sectionConstructor['law-firm-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );