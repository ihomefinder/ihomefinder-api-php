<?php

namespace iHomefinder\Api;

class Url {
		
	const PREFIX = Constants::DOMAIN . "/api/v1/client";
	const SUFFIX = ".json";
	
	const CLIENT = self::PREFIX . self::SUFFIX;
	const CLIENT_BOARDS = self::PREFIX . "/clientBoards" . self::SUFFIX;
	const CLIENT_BOARD = self::PREFIX . "/clientBoard/{clientBoardId}" . self::SUFFIX;
	const BOARDS = self::PREFIX . "/boards" . self::SUFFIX;
	const BOARD = self::PREFIX . "/board/{boardId}" . self::SUFFIX;
	const LISTINGS = self::PREFIX . "/listings" . self::SUFFIX;
	const LISTING = self::PREFIX . "/listing/{listingId}" . self::SUFFIX;
	const SUBSCRIBERS = self::PREFIX . "/subscribers" . self::SUFFIX;
	const SUBSCRIBER = self::PREFIX . "/subscriber/{subscriberId}" . self::SUFFIX;
	const MARKETS = self::PREFIX . "/markets" . self::SUFFIX;
	const MARKET = self::PREFIX . "/market/{marketId}" . self::SUFFIX;
	const LISTING_REPORT = self::PREFIX . "/listingReport/{listingReportId}" . self::SUFFIX;
	const OPEN_HOME_REPORT = self::PREFIX . "/openHomeReport/{openHomeReportId}" . self::SUFFIX;
	const MARKET_REPORT = self::PREFIX . "/marketReport/{marketReportId}" . self::SUFFIX;
	const LISTING_REPORT_SUBSCRIPTIONS = self::PREFIX . "/listingReport/{listingReportId}/subscriptions" . self::SUFFIX;	
	const LISTING_REPORT_SUBSCRIPTION = self::PREFIX . "/listingReport/{listingReportId}/subscription/{listingReportSubscriptionId}" . self::SUFFIX;	
	const OPEN_HOME_REPORT_SUBSCRIPTIONS = self::PREFIX . "/openHomeReport/{openHomeReportId}/subscriptions" . self::SUFFIX;	
	const OPEN_HOME_REPORT_SUBSCRIPTION = self::PREFIX . "/openHomeReport/{openHomeReportId}/subscription/{openHomeReportSubscriptionId}" . self::SUFFIX;	
	const MARKET_REPORT_SUBSCRIPTIONS = self::PREFIX . "/marketReport/{marketReportId}/subscriptions" . self::SUFFIX;	
	const MARKET_REPORT_SUBSCRIPTION = self::PREFIX . "/marketReport/{marketReportId}/subscription/{marketReportSubscriptionId}" . self::SUFFIX;
	const AGENTS = self::PREFIX . "/agents" . self::SUFFIX;
	const AGENT = self::PREFIX . "/agent/{agentId}" . self::SUFFIX;
	const OFFICES = self::PREFIX . "/offices" . self::SUFFIX;
	const OFFICE = self::PREFIX . "/office/{id}" . self::SUFFIX;
	const MORE_INFO_REQUESTS = self::PREFIX . "/moreInfoRequests" . self::SUFFIX;
	const MORE_INFO_REQUEST = self::PREFIX . "/moreInfoRequest/{moreInfoRequestId}" . self::SUFFIX;
	const SCHEDULE_SHOWING_REQUESTS = self::PREFIX . "/scheduleShowingRequests" . self::SUFFIX;
	const SCHEDULE_SHOWING_REQUEST = self::PREFIX . "/scheduleShowingRequest/{scheduleShowingRequestId}" . self::SUFFIX;
	const CONTACT_REQUESTS = self::PREFIX . "/contactRequests" . self::SUFFIX;
	const CONTACT_REQUEST = self::PREFIX . "/contactRequest/{contactRequestId}" . self::SUFFIX;
	const VALUATION_REQUESTS = self::PREFIX . "/valuationRequests" . self::SUFFIX;
	const VALUATION_REQUEST = self::PREFIX . "/valuationRequest/{valuationRequestId}" . self::SUFFIX;
	const EMAIL_UPDATE_SIGNUP_REQUESTS = self::PREFIX . "/emailUpdateSignupRequests" . self::SUFFIX;
	const EMAIL_UPDATE_SIGNUP_REQUEST = self::PREFIX . "/emailUpdateSignupRequest/{emailUpdateSignupRequestId}" . self::SUFFIX;
	const PROPERTY_ORGANIZER_SIGNUP_REQUESTS = self::PREFIX . "/propertyOrganizerSignupRequests" . self::SUFFIX;
	const PROPERTY_ORGANIZER_SIGNUP_REQUEST = self::PREFIX . "/propertyOrganizerSignupRequest/{propertyOrganizerSignupRequestId}" . self::SUFFIX;
	const LISTING_REPORT_SIGNUP_REQUESTS = self::PREFIX . "/listingReportSignupRequests" . self::SUFFIX;
	const LISTING_REPORT_SIGNUP_REQUEST = self::PREFIX . "/listingReportSignupRequest/{listingReportSignupRequestId}" . self::SUFFIX;
	const OPEN_HOME_REPORT_SIGNUP_REQUESTS = self::PREFIX . "/openHomeReportSignupRequests" . self::SUFFIX;
	const OPEN_HOME_REPORT_SIGNUP_REQUEST = self::PREFIX . "/openHomeReportSignupRequest/{openHomeReportSignupRequestId}" . self::SUFFIX;
	const MARKET_REPORT_SIGNUP_REQUESTS = self::PREFIX . "/marketReportSignupRequests" . self::SUFFIX;
	const MARKET_REPORT_SIGNUP_REQUEST = self::PREFIX . "/marketReportSignupRequest/{marketReportSignupRequestId}" . self::SUFFIX;
	
}