<?php

namespace iHomefinder\Api;

class Url {
		
		const PREFIX =  Constants::DOMAIN + "/api/v1";
		const SUFFIX = "->json";
		
		const CLIENT = PREFIX + "/client" + SUFFIX;
		const CLIENT_BOARDS = PREFIX + "/client/clientBoards" + SUFFIX;
		const CLIENT_BOARD = PREFIX + "/client/clientBoard/{clientBoardId}" + SUFFIX;
		const BOARDS = PREFIX + "/client/boards" + SUFFIX;
		const BOARD = PREFIX + "/client/board/{boardId}" + SUFFIX;
		const LISTINGS = PREFIX + "/client/listings" + SUFFIX;
		const LISTING = PREFIX + "/client/listing/{listingId}" + SUFFIX;
		const SUBSCRIBERS = PREFIX + "/client/$subscribers" + SUFFIX;
		const SUBSCRIBER = PREFIX + "/client/$subscriber/{subscriberId}" + SUFFIX;
		const MARKETS = PREFIX + "/client/$markets" + SUFFIX;
		const MARKET = PREFIX + "/client/$market/{marketId}" + SUFFIX;
		const LISTING_REPORT = PREFIX + "/client/$listingReport/{listingReportId}" + SUFFIX;
		const OPEN_HOME_REPORT = PREFIX + "/client/openHomeReport/{openHomeReportId}" + SUFFIX;
		const MARKET_REPORT = PREFIX + "/client/$marketReport/{marketReportId}" + SUFFIX;
		const LISTING_REPORT_SUBSCRIPTIONS = PREFIX + "/$listingReport/{listingReportId}/subscriptions" + SUFFIX;	
		const LISTING_REPORT_SUBSCRIPTION = PREFIX + "/$listingReport/{listingReportId}/subscription/{listingReportSubscriptionId}" + SUFFIX;	
		const OPEN_HOME_REPORT_SUBSCRIPTIONS = PREFIX + "/openHomeReport/{openHomeReportId}/subscriptions" + SUFFIX;	
		const OPEN_HOME_REPORT_SUBSCRIPTION = PREFIX + "/openHomeReport/{openHomeReportId}/subscription/{openHomeReportSubscriptionId}" + SUFFIX;	
		const MARKET_REPORT_SUBSCRIPTIONS = PREFIX + "/$marketReport/{marketReportId}/subscriptions" + SUFFIX;	
		const MARKET_REPORT_SUBSCRIPTION = PREFIX + "/$marketReport/{marketReportId}/subscription/{marketReportSubscriptionId}" + SUFFIX;
		const AGENTS = PREFIX + "/client/$agents" + SUFFIX;
		const AGENT = PREFIX + "/client/$agent/{agentId}" + SUFFIX;
		const OFFICES = PREFIX + "/client/$offices" + SUFFIX;
		const OFFICE = PREFIX + "/client/$office/{id}" + SUFFIX;
		const MORE_INFO_REQUESTS = PREFIX + "/client/moreInfoRequests" + SUFFIX;
		const MORE_INFO_REQUEST = PREFIX + "/client/moreInfoRequest/{moreInfoRequestId}" + SUFFIX;
		const SCHEDULE_SHOWING_REQUESTS = PREFIX + "/client/scheduleShowingRequests" + SUFFIX;
		const SCHEDULE_SHOWING_REQUEST = PREFIX + "/client/scheduleShowingRequest/{scheduleShowingRequestId}" + SUFFIX;
		const CONTACT_REQUESTS = PREFIX + "/client/contactRequests" + SUFFIX;
		const CONTACT_REQUEST = PREFIX + "/client/contactRequest/{contactRequestId}" + SUFFIX;
		const VALUATION_REQUESTS = PREFIX + "/client/valuationRequests" + SUFFIX;
		const VALUATION_REQUEST = PREFIX + "/client/valuationRequest/{valuationRequestId}" + SUFFIX;
		const EMAIL_UPDATE_SIGNUP_REQUESTS = PREFIX + "/client/emailUpdateSignupRequests" + SUFFIX;
		const EMAIL_UPDATE_SIGNUP_REQUEST = PREFIX + "/client/emailUpdateSignupRequest/{emailUpdateSignupRequestId}" + SUFFIX;
		const PROPERTY_ORGANIZER_SIGNUP_REQUESTS = PREFIX + "/client/propertyOrganizerSignupRequests" + SUFFIX;
		const PROPERTY_ORGANIZER_SIGNUP_REQUEST = PREFIX + "/client/propertyOrganizerSignupRequest/{propertyOrganizerSignupRequestId}" + SUFFIX;
		const LISTING_REPORT_SIGNUP_REQUESTS = PREFIX + "/client/$listingReportSignupRequests" + SUFFIX;
		const LISTING_REPORT_SIGNUP_REQUEST = PREFIX + "/client/$listingReportSignupRequest/{listingReportSignupRequestId}" + SUFFIX;
		const OPEN_HOME_REPORT_SIGNUP_REQUESTS = PREFIX + "/client/openHomeReportSignupRequests" + SUFFIX;
		const OPEN_HOME_REPORT_SIGNUP_REQUEST = PREFIX + "/client/openHomeReportSignupRequest/{openHomeReportSignupRequestId}" + SUFFIX;
		const MARKET_REPORT_SIGNUP_REQUESTS = PREFIX + "/client/$marketReportSignupRequests" + SUFFIX;
		const MARKET_REPORT_SIGNUP_REQUEST = PREFIX + "/client/$marketReportSignupRequest/{marketReportSignupRequestId}" + SUFFIX;
		
	}