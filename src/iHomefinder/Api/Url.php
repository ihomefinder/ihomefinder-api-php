<?php

namespace iHomefinder\Api;

class Url {
		
		const PREFIX =  Constants::DOMAIN . "/api/v1";
		const SUFFIX = ".json";
		
		const CLIENT = self::PREFIX . "/client" . self::SUFFIX;
		const CLIENT_BOARDS = self::PREFIX . "/client/clientBoards" . self::SUFFIX;
		const CLIENT_BOARD = self::PREFIX . "/client/clientBoard/{clientBoardId}" . self::SUFFIX;
		const BOARDS = self::PREFIX . "/client/boards" . self::SUFFIX;
		const BOARD = self::PREFIX . "/client/board/{boardId}" . self::SUFFIX;
		const LISTINGS = self::PREFIX . "/client/listings" . self::SUFFIX;
		const LISTING = self::PREFIX . "/client/listing/{listingId}" . self::SUFFIX;
		const SUBSCRIBERS = self::PREFIX . "/client/subscribers" . self::SUFFIX;
		const SUBSCRIBER = self::PREFIX . "/client/subscriber/{subscriberId}" . self::SUFFIX;
		const MARKETS = self::PREFIX . "/client/markets" . self::SUFFIX;
		const MARKET = self::PREFIX . "/client/market/{marketId}" . self::SUFFIX;
		const LISTING_REPORT = self::PREFIX . "/client/listingReport/{listingReportId}" . self::SUFFIX;
		const OPEN_HOME_REPORT = self::PREFIX . "/client/openHomeReport/{openHomeReportId}" . self::SUFFIX;
		const MARKET_REPORT = self::PREFIX . "/client/marketReport/{marketReportId}" . self::SUFFIX;
		const LISTING_REPORT_SUBSCRIPTIONS = self::PREFIX . "/listingReport/{listingReportId}/subscriptions" . self::SUFFIX;	
		const LISTING_REPORT_SUBSCRIPTION = self::PREFIX . "/listingReport/{listingReportId}/subscription/{listingReportSubscriptionId}" . self::SUFFIX;	
		const OPEN_HOME_REPORT_SUBSCRIPTIONS = self::PREFIX . "/openHomeReport/{openHomeReportId}/subscriptions" . self::SUFFIX;	
		const OPEN_HOME_REPORT_SUBSCRIPTION = self::PREFIX . "/openHomeReport/{openHomeReportId}/subscription/{openHomeReportSubscriptionId}" . self::SUFFIX;	
		const MARKET_REPORT_SUBSCRIPTIONS = self::PREFIX . "/marketReport/{marketReportId}/subscriptions" . self::SUFFIX;	
		const MARKET_REPORT_SUBSCRIPTION = self::PREFIX . "/marketReport/{marketReportId}/subscription/{marketReportSubscriptionId}" . self::SUFFIX;
		const AGENTS = self::PREFIX . "/client/agents" . self::SUFFIX;
		const AGENT = self::PREFIX . "/client/agent/{agentId}" . self::SUFFIX;
		const OFFICES = self::PREFIX . "/client/offices" . self::SUFFIX;
		const OFFICE = self::PREFIX . "/client/office/{id}" . self::SUFFIX;
		const MORE_INFO_REQUESTS = self::PREFIX . "/client/moreInfoRequests" . self::SUFFIX;
		const MORE_INFO_REQUEST = self::PREFIX . "/client/moreInfoRequest/{moreInfoRequestId}" . self::SUFFIX;
		const SCHEDULE_SHOWING_REQUESTS = self::PREFIX . "/client/scheduleShowingRequests" . self::SUFFIX;
		const SCHEDULE_SHOWING_REQUEST = self::PREFIX . "/client/scheduleShowingRequest/{scheduleShowingRequestId}" . self::SUFFIX;
		const CONTACT_REQUESTS = self::PREFIX . "/client/contactRequests" . self::SUFFIX;
		const CONTACT_REQUEST = self::PREFIX . "/client/contactRequest/{contactRequestId}" . self::SUFFIX;
		const VALUATION_REQUESTS = self::PREFIX . "/client/valuationRequests" . self::SUFFIX;
		const VALUATION_REQUEST = self::PREFIX . "/client/valuationRequest/{valuationRequestId}" . self::SUFFIX;
		const EMAIL_UPDATE_SIGNUP_REQUESTS = self::PREFIX . "/client/emailUpdateSignupRequests" . self::SUFFIX;
		const EMAIL_UPDATE_SIGNUP_REQUEST = self::PREFIX . "/client/emailUpdateSignupRequest/{emailUpdateSignupRequestId}" . self::SUFFIX;
		const PROPERTY_ORGANIZER_SIGNUP_REQUESTS = self::PREFIX . "/client/propertyOrganizerSignupRequests" . self::SUFFIX;
		const PROPERTY_ORGANIZER_SIGNUP_REQUEST = self::PREFIX . "/client/propertyOrganizerSignupRequest/{propertyOrganizerSignupRequestId}" . self::SUFFIX;
		const LISTING_REPORT_SIGNUP_REQUESTS = self::PREFIX . "/client/listingReportSignupRequests" . self::SUFFIX;
		const LISTING_REPORT_SIGNUP_REQUEST = self::PREFIX . "/client/listingReportSignupRequest/{listingReportSignupRequestId}" . self::SUFFIX;
		const OPEN_HOME_REPORT_SIGNUP_REQUESTS = self::PREFIX . "/client/openHomeReportSignupRequests" . self::SUFFIX;
		const OPEN_HOME_REPORT_SIGNUP_REQUEST = self::PREFIX . "/client/openHomeReportSignupRequest/{openHomeReportSignupRequestId}" . self::SUFFIX;
		const MARKET_REPORT_SIGNUP_REQUESTS = self::PREFIX . "/client/marketReportSignupRequests" . self::SUFFIX;
		const MARKET_REPORT_SIGNUP_REQUEST = self::PREFIX . "/client/marketReportSignupRequest/{marketReportSignupRequestId}" . self::SUFFIX;
		
	}