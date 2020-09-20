'use strict';

( function() {
	/**
	 * The ID of the currently active target.
	 */
	var active  = null;

	/**
	 * The toggles in the document.
	 */
	var toggles = document.getElementsByClassName( 'toggle' );

	/**
	 * Bind events.
	 */
	var init = function() {
		window.addEventListener( 'keyup', onEscape );

		Array.prototype.forEach.call(
			toggles,
			( toggle ) => {
				toggle.addEventListener( 'click', onClick )
			}
		);
	}

	/**
	 * Handle toggle click.
	 */
	var onClick = function( event ) {
		var target = event.currentTarget.getAttribute( 'aria-controls' );

		setActive( target );
	}

	/**
	 * Handle escape keypress.
	 */
	var onEscape = function( event ) {
		if ( 'Escape' === event.key ) {
			setActive( null );
		}
	}

	/**
	 * Set the currently active toggle target. Set active to null when targeting
	 * the already active element.
	 */
	var setActive = function( target ) {
		active = ( target === active) ? null : target;

		update();
	}

	/**
	 * Update toggles and targets to reflect current state.
	 */
	var update = function() {
		Array.prototype.forEach.call(
			toggles,
			( toggle ) => {
				var target = document.getElementById( toggle.getAttribute( 'aria-controls' ) );

				updateTarget( target );
				updateToggle( toggle );
			}
		);
	}

	/**
	 * Update state of target element.
	 */
	var updateTarget = function( el ) {
		if ( el.id === active ) {
			el.classList.add( 'is-open' );
		} else {
			el.classList.remove( 'is-open' );
		}
	}

	/**
	 * Update state of toggle element.
	 */
	var updateToggle = function( el ) {
		if ( el.getAttribute( 'aria-controls' ) === active ) {
			el.classList.add( 'is-open' );
			el.setAttribute( 'aria-expanded', 'true' );
		} else {
			el.classList.remove( 'is-open' );
			el.setAttribute( 'aria-expanded', 'false' );
		}
	}

	/**
	 * Initialize when DOM is ready.
	 */
	window.addEventListener( 'DOMContentLoaded', init );
} )();