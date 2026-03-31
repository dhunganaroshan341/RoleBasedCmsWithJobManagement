--
-- PostgreSQL database dump
--

\restrict FRizywIt0LPhMCXyc7T3PT6WDfgG24qzbKTNdJGV23bakZ3M11lc4qhHsRoQrXE

-- Dumped from database version 16.13 (Ubuntu 16.13-0ubuntu0.24.04.1)
-- Dumped by pg_dump version 16.13 (Ubuntu 16.13-0ubuntu0.24.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: achievements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.achievements (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    count integer DEFAULT 0 NOT NULL,
    icon_class character varying(255),
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    CONSTRAINT achievements_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.achievements OWNER TO postgres;

--
-- Name: achievements_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.achievements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.achievements_id_seq OWNER TO postgres;

--
-- Name: achievements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.achievements_id_seq OWNED BY public.achievements.id;


--
-- Name: applications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.applications (
    id bigint NOT NULL,
    job_id bigint NOT NULL,
    job_seeker_id bigint NOT NULL,
    cover_letter text,
    status character varying(255) DEFAULT 'applied'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT applications_status_check CHECK (((status)::text = ANY ((ARRAY['applied'::character varying, 'shortlisted'::character varying, 'rejected'::character varying])::text[])))
);


ALTER TABLE public.applications OWNER TO postgres;

--
-- Name: applications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.applications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.applications_id_seq OWNER TO postgres;

--
-- Name: applications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.applications_id_seq OWNED BY public.applications.id;


--
-- Name: banner_slider_videos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.banner_slider_videos (
    id bigint NOT NULL,
    type character varying(255) DEFAULT 'upload'::character varying NOT NULL,
    url character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.banner_slider_videos OWNER TO postgres;

--
-- Name: banner_slider_videos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.banner_slider_videos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.banner_slider_videos_id_seq OWNER TO postgres;

--
-- Name: banner_slider_videos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.banner_slider_videos_id_seq OWNED BY public.banner_slider_videos.id;


--
-- Name: call_to_actions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.call_to_actions (
    id bigint NOT NULL,
    page character varying(255) DEFAULT 'home'::character varying NOT NULL,
    title character varying(255) NOT NULL,
    sub_heading character varying(255),
    image character varying(255),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    description text,
    link character varying(255),
    iframe character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT call_to_actions_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.call_to_actions OWNER TO postgres;

--
-- Name: call_to_actions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.call_to_actions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.call_to_actions_id_seq OWNER TO postgres;

--
-- Name: call_to_actions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.call_to_actions_id_seq OWNED BY public.call_to_actions.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT categories_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: category_posts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.category_posts (
    id bigint NOT NULL,
    post_id bigint NOT NULL,
    category_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.category_posts OWNER TO postgres;

--
-- Name: category_posts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.category_posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.category_posts_id_seq OWNER TO postgres;

--
-- Name: category_posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.category_posts_id_seq OWNED BY public.category_posts.id;


--
-- Name: clients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clients (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    contact character varying(255) NOT NULL,
    image character varying(255),
    description text,
    status character varying(255) DEFAULT 'active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT clients_status_check CHECK (((status)::text = ANY ((ARRAY['active'::character varying, 'inactive'::character varying])::text[])))
);


ALTER TABLE public.clients OWNER TO postgres;

--
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.clients_id_seq OWNER TO postgres;

--
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clients_id_seq OWNED BY public.clients.id;


--
-- Name: comments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.comments (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    name character varying(255),
    email character varying(255),
    content text NOT NULL,
    commentable_id bigint NOT NULL,
    commentable_type character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.comments OWNER TO postgres;

--
-- Name: comments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.comments_id_seq OWNER TO postgres;

--
-- Name: comments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.comments_id_seq OWNED BY public.comments.id;


--
-- Name: contacts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contacts (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    subject character varying(255),
    message text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    phone character varying(255)
);


ALTER TABLE public.contacts OWNER TO postgres;

--
-- Name: contacts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contacts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.contacts_id_seq OWNER TO postgres;

--
-- Name: contacts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contacts_id_seq OWNED BY public.contacts.id;


--
-- Name: countries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.countries (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    short_name character varying(255),
    flag_img character varying(255),
    country_code character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.countries OWNER TO postgres;

--
-- Name: countries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.countries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.countries_id_seq OWNER TO postgres;

--
-- Name: countries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.countries_id_seq OWNED BY public.countries.id;


--
-- Name: destinations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.destinations (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    image character varying(255) NOT NULL,
    rating smallint DEFAULT '5'::smallint NOT NULL,
    button_text character varying(255) DEFAULT 'Book Now'::character varying NOT NULL,
    status character varying(255) DEFAULT 'active'::character varying NOT NULL,
    button_link character varying(255) DEFAULT '#'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT destinations_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.destinations OWNER TO postgres;

--
-- Name: destinations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.destinations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.destinations_id_seq OWNER TO postgres;

--
-- Name: destinations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.destinations_id_seq OWNED BY public.destinations.id;


--
-- Name: employer_job_requests; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.employer_job_requests (
    id bigint NOT NULL,
    fname character varying(255) NOT NULL,
    lname character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    company_name character varying(255) NOT NULL,
    web_url character varying(255),
    industry character varying(255) NOT NULL,
    location character varying(255) NOT NULL,
    "position" character varying(255) NOT NULL,
    openings character varying(255) NOT NULL,
    salary_range character varying(255) NOT NULL,
    job_description text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.employer_job_requests OWNER TO postgres;

--
-- Name: employer_job_requests_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.employer_job_requests_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.employer_job_requests_id_seq OWNER TO postgres;

--
-- Name: employer_job_requests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.employer_job_requests_id_seq OWNED BY public.employer_job_requests.id;


--
-- Name: employer_profiles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.employer_profiles (
    id bigint NOT NULL,
    user_id bigint,
    company_name character varying(255) NOT NULL,
    contact_person character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255),
    country character varying(255),
    city character varying(255),
    company_details text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.employer_profiles OWNER TO postgres;

--
-- Name: employer_profiles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.employer_profiles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.employer_profiles_id_seq OWNER TO postgres;

--
-- Name: employer_profiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.employer_profiles_id_seq OWNED BY public.employer_profiles.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: faqs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.faqs (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    description text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.faqs OWNER TO postgres;

--
-- Name: faqs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.faqs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.faqs_id_seq OWNER TO postgres;

--
-- Name: faqs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.faqs_id_seq OWNED BY public.faqs.id;


--
-- Name: featured_services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.featured_services (
    id bigint NOT NULL,
    service_id bigint NOT NULL,
    sort_order integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.featured_services OWNER TO postgres;

--
-- Name: featured_services_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.featured_services_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.featured_services_id_seq OWNER TO postgres;

--
-- Name: featured_services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.featured_services_id_seq OWNED BY public.featured_services.id;


--
-- Name: frontends; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.frontends (
    id bigint NOT NULL,
    about_us_title character varying(255) NOT NULL,
    about_us_description text NOT NULL,
    about_us_value character varying(255) NOT NULL,
    about_us_value_description text NOT NULL,
    contact_us_email character varying(255) NOT NULL,
    contact_us_address character varying(255) NOT NULL,
    contact_us_number character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.frontends OWNER TO postgres;

--
-- Name: frontends_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.frontends_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.frontends_id_seq OWNER TO postgres;

--
-- Name: frontends_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.frontends_id_seq OWNED BY public.frontends.id;


--
-- Name: gallery_albums; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.gallery_albums (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    type character varying(255) DEFAULT 'image'::character varying NOT NULL,
    url character varying(255),
    client_id bigint,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    slug character varying(255),
    CONSTRAINT gallery_albums_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[]))),
    CONSTRAINT gallery_albums_type_check CHECK (((type)::text = ANY ((ARRAY['image'::character varying, 'video'::character varying, 'pdf'::character varying, 'doc'::character varying, 'website'::character varying, 'none'::character varying, 'other_link'::character varying])::text[])))
);


ALTER TABLE public.gallery_albums OWNER TO postgres;

--
-- Name: gallery_albums_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.gallery_albums_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.gallery_albums_id_seq OWNER TO postgres;

--
-- Name: gallery_albums_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.gallery_albums_id_seq OWNED BY public.gallery_albums.id;


--
-- Name: gallery_media; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.gallery_media (
    id bigint NOT NULL,
    gallery_album_id bigint NOT NULL,
    media_path character varying(255),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT gallery_media_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.gallery_media OWNER TO postgres;

--
-- Name: gallery_media_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.gallery_media_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.gallery_media_id_seq OWNER TO postgres;

--
-- Name: gallery_media_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.gallery_media_id_seq OWNED BY public.gallery_media.id;


--
-- Name: home_slides; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.home_slides (
    id bigint NOT NULL,
    image character varying(255) NOT NULL,
    title character varying(255) NOT NULL,
    shortdesc text,
    link_text character varying(255),
    link_url character varying(255),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT home_slides_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.home_slides OWNER TO postgres;

--
-- Name: home_slides_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.home_slides_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.home_slides_id_seq OWNER TO postgres;

--
-- Name: home_slides_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.home_slides_id_seq OWNED BY public.home_slides.id;


--
-- Name: itineraries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.itineraries (
    id bigint NOT NULL,
    tour_package_id bigint NOT NULL,
    day_number integer,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    title character varying(255),
    "order" integer DEFAULT 0 NOT NULL,
    description text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT itineraries_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.itineraries OWNER TO postgres;

--
-- Name: itineraries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.itineraries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.itineraries_id_seq OWNER TO postgres;

--
-- Name: itineraries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.itineraries_id_seq OWNED BY public.itineraries.id;


--
-- Name: job_applications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_applications (
    id bigint NOT NULL,
    job_id bigint NOT NULL,
    job_seeker_profile_id bigint,
    name character varying(255),
    email character varying(255),
    phone character varying(255),
    resume_file character varying(255),
    bio text,
    desired_role character varying(255),
    status character varying(255) DEFAULT 'Pending'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT job_applications_status_check CHECK (((status)::text = ANY ((ARRAY['Pending'::character varying, 'Reviewed'::character varying, 'Accepted'::character varying, 'Rejected'::character varying])::text[])))
);


ALTER TABLE public.job_applications OWNER TO postgres;

--
-- Name: job_applications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.job_applications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.job_applications_id_seq OWNER TO postgres;

--
-- Name: job_applications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.job_applications_id_seq OWNED BY public.job_applications.id;


--
-- Name: job_categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    image character varying(255),
    icon_class character varying(255),
    description text,
    slug character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.job_categories OWNER TO postgres;

--
-- Name: job_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.job_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.job_categories_id_seq OWNER TO postgres;

--
-- Name: job_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.job_categories_id_seq OWNED BY public.job_categories.id;


--
-- Name: job_category_job; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_category_job (
    id bigint NOT NULL,
    job_id bigint NOT NULL,
    job_category_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.job_category_job OWNER TO postgres;

--
-- Name: job_category_job_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.job_category_job_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.job_category_job_id_seq OWNER TO postgres;

--
-- Name: job_category_job_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.job_category_job_id_seq OWNED BY public.job_category_job.id;


--
-- Name: job_category_vacancy; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_category_vacancy (
    id bigint NOT NULL,
    vacancy_id bigint NOT NULL,
    job_category_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.job_category_vacancy OWNER TO postgres;

--
-- Name: job_category_vacancy_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.job_category_vacancy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.job_category_vacancy_id_seq OWNER TO postgres;

--
-- Name: job_category_vacancy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.job_category_vacancy_id_seq OWNED BY public.job_category_vacancy.id;


--
-- Name: job_seeker_profiles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_seeker_profiles (
    id bigint NOT NULL,
    user_id bigint,
    bio text,
    skills text,
    experience text,
    education text,
    resume_file character varying(255),
    name character varying(255),
    email character varying(255),
    phone character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.job_seeker_profiles OWNER TO postgres;

--
-- Name: job_seeker_profiles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.job_seeker_profiles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.job_seeker_profiles_id_seq OWNER TO postgres;

--
-- Name: job_seeker_profiles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.job_seeker_profiles_id_seq OWNED BY public.job_seeker_profiles.id;


--
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    employer_id bigint,
    vacancy_id bigint NOT NULL,
    title character varying(255) NOT NULL,
    description text,
    requirements text,
    location character varying(255),
    slug character varying(255),
    "order" integer,
    salary character varying(255),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    image character varying(255),
    pdf character varying(255),
    link character varying(255),
    icon_class character varying(255),
    our_country_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    interview_date date,
    job_code character varying(255),
    custom_company_name character varying(255),
    male_opening integer DEFAULT 0 NOT NULL,
    female_opening integer DEFAULT 0 NOT NULL,
    total_openings integer DEFAULT 0 NOT NULL,
    CONSTRAINT jobs_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: newsletter_subscribers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.newsletter_subscribers (
    id bigint NOT NULL,
    email character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.newsletter_subscribers OWNER TO postgres;

--
-- Name: newsletter_subscribers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.newsletter_subscribers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.newsletter_subscribers_id_seq OWNER TO postgres;

--
-- Name: newsletter_subscribers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.newsletter_subscribers_id_seq OWNED BY public.newsletter_subscribers.id;


--
-- Name: notices; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.notices (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    image character varying(255),
    description text,
    status character varying(255) DEFAULT 'Inactive'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    url character varying(255),
    CONSTRAINT notices_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.notices OWNER TO postgres;

--
-- Name: notices_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.notices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.notices_id_seq OWNER TO postgres;

--
-- Name: notices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.notices_id_seq OWNED BY public.notices.id;


--
-- Name: our_countries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.our_countries (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.our_countries OWNER TO postgres;

--
-- Name: our_countries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.our_countries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.our_countries_id_seq OWNER TO postgres;

--
-- Name: our_countries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.our_countries_id_seq OWNED BY public.our_countries.id;


--
-- Name: package_bookings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.package_bookings (
    id bigint NOT NULL,
    user_id bigint,
    email character varying(255),
    name character varying(255),
    phone character varying(255),
    country character varying(255),
    message text,
    children smallint DEFAULT '0'::smallint NOT NULL,
    adult smallint DEFAULT '1'::smallint NOT NULL,
    total_people smallint DEFAULT '1'::smallint NOT NULL,
    price numeric(10,2),
    tour_package_id bigint,
    tour_batch_id bigint,
    custom_date date,
    booking_type character varying(255) DEFAULT 'batch'::character varying NOT NULL,
    status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    special_requests text,
    payment_status character varying(255) DEFAULT 'unpaid'::character varying NOT NULL,
    amount_paid numeric(10,2),
    currency character varying(3) DEFAULT 'USD'::character varying NOT NULL,
    trip_start_date date,
    trip_end_date date,
    is_archived boolean DEFAULT false NOT NULL,
    booking_reference character varying(255),
    ip_address character varying(45),
    user_agent character varying(255),
    confirmed_at timestamp(0) without time zone,
    cancelled_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone,
    CONSTRAINT package_bookings_payment_status_check CHECK (((payment_status)::text = ANY ((ARRAY['unpaid'::character varying, 'partial'::character varying, 'paid'::character varying])::text[]))),
    CONSTRAINT package_bookings_status_check CHECK (((status)::text = ANY ((ARRAY['active'::character varying, 'inactive'::character varying, 'pending'::character varying, 'confirmed'::character varying, 'cancelled'::character varying])::text[])))
);


ALTER TABLE public.package_bookings OWNER TO postgres;

--
-- Name: package_bookings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.package_bookings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.package_bookings_id_seq OWNER TO postgres;

--
-- Name: package_bookings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.package_bookings_id_seq OWNED BY public.package_bookings.id;


--
-- Name: package_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.package_types (
    id bigint NOT NULL,
    title character varying(100) NOT NULL,
    short_desc character varying(255),
    description text,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT package_types_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.package_types OWNER TO postgres;

--
-- Name: COLUMN package_types.title; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.package_types.title IS 'title of the package type';


--
-- Name: COLUMN package_types.short_desc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.package_types.short_desc IS 'Short description of the package type';


--
-- Name: COLUMN package_types.description; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.package_types.description IS 'Detailed description of the package type';


--
-- Name: COLUMN package_types.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.package_types.status IS 'Status of the package type';


--
-- Name: package_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.package_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.package_types_id_seq OWNER TO postgres;

--
-- Name: package_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.package_types_id_seq OWNED BY public.package_types.id;


--
-- Name: page_banners; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.page_banners (
    id bigint NOT NULL,
    title character varying(255),
    sub_heading character varying(255),
    description character varying(255),
    page character varying(255) NOT NULL,
    section character varying(255) NOT NULL,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    image character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT page_banners_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.page_banners OWNER TO postgres;

--
-- Name: page_banners_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.page_banners_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.page_banners_id_seq OWNER TO postgres;

--
-- Name: page_banners_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.page_banners_id_seq OWNED BY public.page_banners.id;


--
-- Name: pages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pages (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    content text,
    meta_title character varying(255),
    meta_description text,
    meta_keywords character varying(255),
    title1 character varying(255),
    title2 character varying(255),
    short_desc1 text,
    short_desc2 text,
    desc1 text,
    desc2 text,
    image1 character varying(255),
    image2 character varying(255),
    video1 character varying(255),
    video2 character varying(255),
    gallery_images json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    content_heading character varying(255),
    content_subheading character varying(255)
);


ALTER TABLE public.pages OWNER TO postgres;

--
-- Name: pages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pages_id_seq OWNER TO postgres;

--
-- Name: pages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pages_id_seq OWNED BY public.pages.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: post_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.post_images (
    id bigint NOT NULL,
    post_id bigint NOT NULL,
    image character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.post_images OWNER TO postgres;

--
-- Name: post_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.post_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.post_images_id_seq OWNER TO postgres;

--
-- Name: post_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.post_images_id_seq OWNED BY public.post_images.id;


--
-- Name: post_tag; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.post_tag (
    id bigint NOT NULL,
    post_id bigint NOT NULL,
    tag_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.post_tag OWNER TO postgres;

--
-- Name: post_tag_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.post_tag_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.post_tag_id_seq OWNER TO postgres;

--
-- Name: post_tag_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.post_tag_id_seq OWNED BY public.post_tag.id;


--
-- Name: posts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.posts (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255),
    description text NOT NULL,
    created_by bigint,
    updated_by bigint,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    views bigint DEFAULT '0'::bigint NOT NULL,
    CONSTRAINT posts_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.posts OWNER TO postgres;

--
-- Name: posts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.posts_id_seq OWNER TO postgres;

--
-- Name: posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.posts_id_seq OWNED BY public.posts.id;


--
-- Name: price_includes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.price_includes (
    id bigint NOT NULL,
    tour_package_id bigint NOT NULL,
    title character varying(255),
    price character varying(255),
    is_included boolean DEFAULT true NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.price_includes OWNER TO postgres;

--
-- Name: price_includes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.price_includes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.price_includes_id_seq OWNER TO postgres;

--
-- Name: price_includes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.price_includes_id_seq OWNED BY public.price_includes.id;


--
-- Name: section_categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.section_categories (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    sub_heading character varying(255) NOT NULL,
    image character varying(255),
    video character varying(255),
    slug character varying(255),
    description text,
    description2 text,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT section_categories_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.section_categories OWNER TO postgres;

--
-- Name: section_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.section_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.section_categories_id_seq OWNER TO postgres;

--
-- Name: section_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.section_categories_id_seq OWNED BY public.section_categories.id;


--
-- Name: section_category_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.section_category_images (
    id bigint NOT NULL,
    section_category_id bigint NOT NULL,
    image character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.section_category_images OWNER TO postgres;

--
-- Name: section_category_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.section_category_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.section_category_images_id_seq OWNER TO postgres;

--
-- Name: section_category_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.section_category_images_id_seq OWNED BY public.section_category_images.id;


--
-- Name: section_contents; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.section_contents (
    id bigint NOT NULL,
    section_category_id bigint NOT NULL,
    title character varying(255) NOT NULL,
    short_description character varying(255),
    "order" integer DEFAULT 0 NOT NULL,
    image character varying(255),
    video character varying(255),
    pdf character varying(255),
    description text,
    description2 text,
    icon_class character varying(255),
    link_title character varying(255),
    link_url character varying(255),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT section_contents_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.section_contents OWNER TO postgres;

--
-- Name: section_contents_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.section_contents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.section_contents_id_seq OWNER TO postgres;

--
-- Name: section_contents_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.section_contents_id_seq OWNED BY public.section_contents.id;


--
-- Name: service_queries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.service_queries (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    message text,
    service_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.service_queries OWNER TO postgres;

--
-- Name: service_queries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.service_queries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.service_queries_id_seq OWNER TO postgres;

--
-- Name: service_queries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.service_queries_id_seq OWNED BY public.service_queries.id;


--
-- Name: services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.services (
    id bigint NOT NULL,
    name character varying(100) NOT NULL,
    short_desc character varying(255),
    description text,
    status integer DEFAULT 1 NOT NULL,
    price integer DEFAULT 100 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    image character varying(100)
);


ALTER TABLE public.services OWNER TO postgres;

--
-- Name: services_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.services_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.services_id_seq OWNER TO postgres;

--
-- Name: services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.services_id_seq OWNED BY public.services.id;


--
-- Name: settings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.settings (
    id bigint NOT NULL,
    logo character varying(255),
    title character varying(255),
    contact character varying(255),
    email character varying(255),
    address character varying(255),
    description text,
    work_description text,
    facebook_url character varying(255),
    twitter_url character varying(255),
    github_url character varying(255),
    instagram_url character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    welcome_image character varying(255),
    about_image character varying(255)
);


ALTER TABLE public.settings OWNER TO postgres;

--
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.settings_id_seq OWNER TO postgres;

--
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- Name: states; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.states (
    id bigint NOT NULL,
    country_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.states OWNER TO postgres;

--
-- Name: states_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.states_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.states_id_seq OWNER TO postgres;

--
-- Name: states_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.states_id_seq OWNED BY public.states.id;


--
-- Name: tags; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tags (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tags OWNER TO postgres;

--
-- Name: tags_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tags_id_seq OWNER TO postgres;

--
-- Name: tags_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tags_id_seq OWNED BY public.tags.id;


--
-- Name: testimonials; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.testimonials (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    image character varying(255),
    designation character varying(255),
    address character varying(255),
    description text,
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT testimonials_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.testimonials OWNER TO postgres;

--
-- Name: testimonials_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.testimonials_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.testimonials_id_seq OWNER TO postgres;

--
-- Name: testimonials_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.testimonials_id_seq OWNED BY public.testimonials.id;


--
-- Name: tour_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tour_batches (
    id bigint NOT NULL,
    tour_package_id bigint NOT NULL,
    start_date date NOT NULL,
    end_date date,
    max_people integer NOT NULL,
    available_seats integer NOT NULL,
    price integer,
    status character varying(255) DEFAULT 'active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT tour_batches_status_check CHECK (((status)::text = ANY ((ARRAY['active'::character varying, 'full'::character varying, 'closed'::character varying])::text[])))
);


ALTER TABLE public.tour_batches OWNER TO postgres;

--
-- Name: tour_batches_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tour_batches_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tour_batches_id_seq OWNER TO postgres;

--
-- Name: tour_batches_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tour_batches_id_seq OWNED BY public.tour_batches.id;


--
-- Name: tour_faqs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tour_faqs (
    id bigint NOT NULL,
    tour_package_id bigint NOT NULL,
    question character varying(255) NOT NULL,
    answer text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tour_faqs OWNER TO postgres;

--
-- Name: tour_faqs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tour_faqs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tour_faqs_id_seq OWNER TO postgres;

--
-- Name: tour_faqs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tour_faqs_id_seq OWNED BY public.tour_faqs.id;


--
-- Name: tour_package_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tour_package_images (
    id bigint NOT NULL,
    tour_package_id bigint NOT NULL,
    image_path character varying(255) NOT NULL,
    caption character varying(255),
    is_featured boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tour_package_images OWNER TO postgres;

--
-- Name: tour_package_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tour_package_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tour_package_images_id_seq OWNER TO postgres;

--
-- Name: tour_package_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tour_package_images_id_seq OWNED BY public.tour_package_images.id;


--
-- Name: tour_package_services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tour_package_services (
    id bigint NOT NULL,
    tour_package_id bigint NOT NULL,
    service_id bigint NOT NULL,
    title character varying(255),
    description text,
    price numeric(10,2),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT tour_package_services_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.tour_package_services OWNER TO postgres;

--
-- Name: COLUMN tour_package_services.title; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tour_package_services.title IS 'Context-specific title for the service';


--
-- Name: COLUMN tour_package_services.description; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tour_package_services.description IS 'Details or notes about the service for this package';


--
-- Name: COLUMN tour_package_services.price; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tour_package_services.price IS 'Optional price adjustment or cost for this service';


--
-- Name: COLUMN tour_package_services.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tour_package_services.status IS 'Service status';


--
-- Name: tour_package_services_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tour_package_services_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tour_package_services_id_seq OWNER TO postgres;

--
-- Name: tour_package_services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tour_package_services_id_seq OWNED BY public.tour_package_services.id;


--
-- Name: tour_package_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tour_package_types (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tour_package_types OWNER TO postgres;

--
-- Name: tour_package_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tour_package_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tour_package_types_id_seq OWNER TO postgres;

--
-- Name: tour_package_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tour_package_types_id_seq OWNED BY public.tour_package_types.id;


--
-- Name: tour_package_videos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tour_package_videos (
    id bigint NOT NULL,
    tour_package_id bigint NOT NULL,
    title character varying(255),
    iframe_embed_code text,
    iframe text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tour_package_videos OWNER TO postgres;

--
-- Name: tour_package_videos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tour_package_videos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tour_package_videos_id_seq OWNER TO postgres;

--
-- Name: tour_package_videos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tour_package_videos_id_seq OWNED BY public.tour_package_videos.id;


--
-- Name: tour_packages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tour_packages (
    id bigint NOT NULL,
    our_country_id bigint NOT NULL,
    service_id bigint,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    short_description text,
    long_description text,
    price_includes json,
    price_excludes json,
    what_to_expect text,
    itinerary text,
    top_deal boolean DEFAULT false NOT NULL,
    favourite_destination boolean DEFAULT false NOT NULL,
    location character varying(255),
    duration character varying(255),
    accomodation character varying(255),
    type character varying(255),
    difficulty character varying(255),
    package_type character varying(255) DEFAULT 'tour'::character varying NOT NULL,
    max_elevation integer,
    max_people integer,
    available_seats integer,
    best_season character varying(255),
    pickup character varying(255) DEFAULT 'Tribhuvan International Airport (KTM)'::character varying NOT NULL,
    drop character varying(255) DEFAULT 'Tribhuvan International Airport (KTM)'::character varying NOT NULL,
    end_point character varying(255),
    start_point character varying(255),
    price numeric(10,2),
    status character varying(255) DEFAULT 'Active'::character varying NOT NULL,
    more_details json,
    images json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    is_featured boolean DEFAULT false NOT NULL,
    "order" integer DEFAULT 0 NOT NULL,
    parent_id bigint,
    tour_package_type_id bigint,
    CONSTRAINT tour_packages_difficulty_check CHECK (((difficulty)::text = ANY ((ARRAY['easy'::character varying, 'moderate'::character varying, 'hard'::character varying])::text[]))),
    CONSTRAINT tour_packages_package_type_check CHECK (((package_type)::text = ANY ((ARRAY['trekking'::character varying, 'tour'::character varying, 'other'::character varying])::text[]))),
    CONSTRAINT tour_packages_status_check CHECK (((status)::text = ANY ((ARRAY['Active'::character varying, 'Inactive'::character varying])::text[])))
);


ALTER TABLE public.tour_packages OWNER TO postgres;

--
-- Name: tour_packages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tour_packages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tour_packages_id_seq OWNER TO postgres;

--
-- Name: tour_packages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tour_packages_id_seq OWNED BY public.tour_packages.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    full_name character varying(255) NOT NULL,
    role character varying(255) NOT NULL,
    "position" character varying(255),
    image character varying(255),
    email character varying(255) NOT NULL,
    password character varying(255),
    email_link character varying(255),
    facebook_link character varying(255),
    instagram_link character varying(255),
    twitter_link character varying(255),
    phonenumber character varying(255),
    notes text,
    email_verified_at timestamp(0) without time zone,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    google_id character varying(255),
    "order" integer DEFAULT 0 NOT NULL,
    CONSTRAINT users_role_check CHECK (((role)::text = ANY ((ARRAY['Admin'::character varying, 'User'::character varying])::text[])))
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: vacancies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vacancies (
    id bigint NOT NULL,
    company_id bigint,
    custom_company_name character varying(255),
    custom_company_country character varying(255),
    vacancy_code character varying(255),
    title character varying(255) NOT NULL,
    currency character varying(255),
    interview_date date,
    general_requirements text,
    vacancy_image character varying(255),
    description text,
    status character varying(255) DEFAULT 'active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.vacancies OWNER TO postgres;

--
-- Name: vacancies_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vacancies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.vacancies_id_seq OWNER TO postgres;

--
-- Name: vacancies_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vacancies_id_seq OWNED BY public.vacancies.id;


--
-- Name: working_days; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.working_days (
    id bigint NOT NULL,
    setting_id bigint NOT NULL,
    days json NOT NULL,
    starting_time time(0) without time zone NOT NULL,
    ending_time time(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.working_days OWNER TO postgres;

--
-- Name: working_days_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.working_days_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.working_days_id_seq OWNER TO postgres;

--
-- Name: working_days_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.working_days_id_seq OWNED BY public.working_days.id;


--
-- Name: achievements id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.achievements ALTER COLUMN id SET DEFAULT nextval('public.achievements_id_seq'::regclass);


--
-- Name: applications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applications ALTER COLUMN id SET DEFAULT nextval('public.applications_id_seq'::regclass);


--
-- Name: banner_slider_videos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.banner_slider_videos ALTER COLUMN id SET DEFAULT nextval('public.banner_slider_videos_id_seq'::regclass);


--
-- Name: call_to_actions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.call_to_actions ALTER COLUMN id SET DEFAULT nextval('public.call_to_actions_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: category_posts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_posts ALTER COLUMN id SET DEFAULT nextval('public.category_posts_id_seq'::regclass);


--
-- Name: clients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients ALTER COLUMN id SET DEFAULT nextval('public.clients_id_seq'::regclass);


--
-- Name: comments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments ALTER COLUMN id SET DEFAULT nextval('public.comments_id_seq'::regclass);


--
-- Name: contacts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contacts ALTER COLUMN id SET DEFAULT nextval('public.contacts_id_seq'::regclass);


--
-- Name: countries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.countries ALTER COLUMN id SET DEFAULT nextval('public.countries_id_seq'::regclass);


--
-- Name: destinations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.destinations ALTER COLUMN id SET DEFAULT nextval('public.destinations_id_seq'::regclass);


--
-- Name: employer_job_requests id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employer_job_requests ALTER COLUMN id SET DEFAULT nextval('public.employer_job_requests_id_seq'::regclass);


--
-- Name: employer_profiles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employer_profiles ALTER COLUMN id SET DEFAULT nextval('public.employer_profiles_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: faqs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faqs ALTER COLUMN id SET DEFAULT nextval('public.faqs_id_seq'::regclass);


--
-- Name: featured_services id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.featured_services ALTER COLUMN id SET DEFAULT nextval('public.featured_services_id_seq'::regclass);


--
-- Name: frontends id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.frontends ALTER COLUMN id SET DEFAULT nextval('public.frontends_id_seq'::regclass);


--
-- Name: gallery_albums id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gallery_albums ALTER COLUMN id SET DEFAULT nextval('public.gallery_albums_id_seq'::regclass);


--
-- Name: gallery_media id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gallery_media ALTER COLUMN id SET DEFAULT nextval('public.gallery_media_id_seq'::regclass);


--
-- Name: home_slides id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.home_slides ALTER COLUMN id SET DEFAULT nextval('public.home_slides_id_seq'::regclass);


--
-- Name: itineraries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itineraries ALTER COLUMN id SET DEFAULT nextval('public.itineraries_id_seq'::regclass);


--
-- Name: job_applications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_applications ALTER COLUMN id SET DEFAULT nextval('public.job_applications_id_seq'::regclass);


--
-- Name: job_categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_categories ALTER COLUMN id SET DEFAULT nextval('public.job_categories_id_seq'::regclass);


--
-- Name: job_category_job id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_job ALTER COLUMN id SET DEFAULT nextval('public.job_category_job_id_seq'::regclass);


--
-- Name: job_category_vacancy id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_vacancy ALTER COLUMN id SET DEFAULT nextval('public.job_category_vacancy_id_seq'::regclass);


--
-- Name: job_seeker_profiles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_seeker_profiles ALTER COLUMN id SET DEFAULT nextval('public.job_seeker_profiles_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: newsletter_subscribers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newsletter_subscribers ALTER COLUMN id SET DEFAULT nextval('public.newsletter_subscribers_id_seq'::regclass);


--
-- Name: notices id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notices ALTER COLUMN id SET DEFAULT nextval('public.notices_id_seq'::regclass);


--
-- Name: our_countries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.our_countries ALTER COLUMN id SET DEFAULT nextval('public.our_countries_id_seq'::regclass);


--
-- Name: package_bookings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_bookings ALTER COLUMN id SET DEFAULT nextval('public.package_bookings_id_seq'::regclass);


--
-- Name: package_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_types ALTER COLUMN id SET DEFAULT nextval('public.package_types_id_seq'::regclass);


--
-- Name: page_banners id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.page_banners ALTER COLUMN id SET DEFAULT nextval('public.page_banners_id_seq'::regclass);


--
-- Name: pages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pages ALTER COLUMN id SET DEFAULT nextval('public.pages_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: post_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_images ALTER COLUMN id SET DEFAULT nextval('public.post_images_id_seq'::regclass);


--
-- Name: post_tag id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_tag ALTER COLUMN id SET DEFAULT nextval('public.post_tag_id_seq'::regclass);


--
-- Name: posts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts ALTER COLUMN id SET DEFAULT nextval('public.posts_id_seq'::regclass);


--
-- Name: price_includes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.price_includes ALTER COLUMN id SET DEFAULT nextval('public.price_includes_id_seq'::regclass);


--
-- Name: section_categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_categories ALTER COLUMN id SET DEFAULT nextval('public.section_categories_id_seq'::regclass);


--
-- Name: section_category_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_category_images ALTER COLUMN id SET DEFAULT nextval('public.section_category_images_id_seq'::regclass);


--
-- Name: section_contents id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_contents ALTER COLUMN id SET DEFAULT nextval('public.section_contents_id_seq'::regclass);


--
-- Name: service_queries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.service_queries ALTER COLUMN id SET DEFAULT nextval('public.service_queries_id_seq'::regclass);


--
-- Name: services id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services ALTER COLUMN id SET DEFAULT nextval('public.services_id_seq'::regclass);


--
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- Name: states id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.states ALTER COLUMN id SET DEFAULT nextval('public.states_id_seq'::regclass);


--
-- Name: tags id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tags ALTER COLUMN id SET DEFAULT nextval('public.tags_id_seq'::regclass);


--
-- Name: testimonials id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.testimonials ALTER COLUMN id SET DEFAULT nextval('public.testimonials_id_seq'::regclass);


--
-- Name: tour_batches id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_batches ALTER COLUMN id SET DEFAULT nextval('public.tour_batches_id_seq'::regclass);


--
-- Name: tour_faqs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_faqs ALTER COLUMN id SET DEFAULT nextval('public.tour_faqs_id_seq'::regclass);


--
-- Name: tour_package_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_images ALTER COLUMN id SET DEFAULT nextval('public.tour_package_images_id_seq'::regclass);


--
-- Name: tour_package_services id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_services ALTER COLUMN id SET DEFAULT nextval('public.tour_package_services_id_seq'::regclass);


--
-- Name: tour_package_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_types ALTER COLUMN id SET DEFAULT nextval('public.tour_package_types_id_seq'::regclass);


--
-- Name: tour_package_videos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_videos ALTER COLUMN id SET DEFAULT nextval('public.tour_package_videos_id_seq'::regclass);


--
-- Name: tour_packages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_packages ALTER COLUMN id SET DEFAULT nextval('public.tour_packages_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: vacancies id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacancies ALTER COLUMN id SET DEFAULT nextval('public.vacancies_id_seq'::regclass);


--
-- Name: working_days id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.working_days ALTER COLUMN id SET DEFAULT nextval('public.working_days_id_seq'::regclass);


--
-- Data for Name: achievements; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.achievements (id, title, count, icon_class, description, created_at, updated_at, status) FROM stdin;
1	Happy Customers	100	fa fa-smile	Over 100 satisfied clients from around the globe.	2026-03-30 18:07:38	2026-03-30 18:07:38	Active
2	Amazing Tours	50	fa fa-map-marked-alt	We’ve organized 50+ breathtaking tours across Asia.	2026-03-30 18:07:38	2026-03-30 18:07:38	Active
3	In Business	3472	fa fa-briefcase	Over 3,400 days of consistent travel excellence.	2026-03-30 18:07:38	2026-03-30 18:07:38	Active
4	Support Case	523	fa fa-headset	Issues solved for our beloved travelers with care.	2026-03-30 18:07:38	2026-03-30 18:07:38	Active
\.


--
-- Data for Name: applications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.applications (id, job_id, job_seeker_id, cover_letter, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: banner_slider_videos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.banner_slider_videos (id, type, url, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: call_to_actions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.call_to_actions (id, page, title, sub_heading, image, status, description, link, iframe, created_at, updated_at) FROM stdin;
1	home	Do you need help?	\N	hero_cta.jpg	Active	Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?	contact-us	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
2	about	Do you need help?	\N	hero_cta.jpg	Active	Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?	contact-us	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
3	contact	Do you need help?	\N	hero_cta.jpg	Active	Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?	contact-us	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
4	gallery	Do you need help?	\N	hero_cta.jpg	Active	Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?	contact-us	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
5	services	Do you need help?	\N	hero_cta.jpg	Active	Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?	contact-us	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
6	blog	Do you need help?	\N	hero_cta.jpg	Active	Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?	contact-us	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, title, slug, status, created_at, updated_at) FROM stdin;
1	Career Advice	career-advice	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
2	Industry Insights	industry-insights	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
3	Employee Management	employee-management	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
4	Training & Development	training-development	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
5	Company Updates	company-updates	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: category_posts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.category_posts (id, post_id, category_id, created_at, updated_at) FROM stdin;
1	1	2	\N	\N
2	2	5	\N	\N
3	3	5	\N	\N
4	4	2	\N	\N
5	5	3	\N	\N
6	5	1	\N	\N
7	6	2	\N	\N
8	6	3	\N	\N
9	6	5	\N	\N
10	7	3	\N	\N
11	7	4	\N	\N
12	8	1	\N	\N
13	8	5	\N	\N
14	8	4	\N	\N
15	9	3	\N	\N
16	10	1	\N	\N
\.


--
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.clients (id, name, email, address, contact, image, description, status, created_at, updated_at) FROM stdin;
1	Kylee Waters	earline.collier@example.org	2310 Demond Cape\nPort Emmet, AZ 52474-9672	757-751-0706	https://via.placeholder.com/640x480.png/003355?text=incidunt	Atque hic sint nihil aperiam. Provident et quas soluta ad eos rerum. Possimus dolor iure eveniet error. Laudantium commodi nulla accusantium quod enim aut.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
2	Gene Herzog MD	ada.mckenzie@example.org	41548 Alberto Cape\nMonserratside, PA 27423	631-558-4038	https://via.placeholder.com/640x480.png/0011ee?text=quis	Nemo enim modi non aut id consequatur commodi. Et consequuntur quam dolores non sed minus autem dolores. Non non modi pariatur accusantium est et laboriosam.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
3	Prof. Willis Legros PhD	mayer.pietro@example.org	4577 Cristina Extensions Suite 516\nKuvalisberg, MD 32870	+1-970-805-2865	https://via.placeholder.com/640x480.png/00aa44?text=est	Beatae dignissimos ut sapiente. Vero enim quaerat sit repudiandae recusandae quae nulla. Perferendis quo incidunt quis eligendi enim sit deserunt.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
4	Baylee Harvey	candido.emard@example.com	128 Gleason Stream\nBricemouth, MO 16297-1095	754-267-1903	https://via.placeholder.com/640x480.png/00ff77?text=tenetur	Vel et earum consequuntur eius alias explicabo assumenda. Qui molestias aut ad et odit qui. Aut perferendis ducimus et a molestias perferendis. Quidem minus alias eum fugiat.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
5	Amara Lebsack	mikayla60@example.com	476 Lang Way Apt. 418\nEnidshire, WY 97185-9218	1-320-951-1668	https://via.placeholder.com/640x480.png/00cc55?text=sed	Aperiam velit ratione eos. Commodi itaque similique id ut dolore. Debitis pariatur facilis quis inventore est.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
6	Jamir Hudson	ylemke@example.org	388 Denis Trace Apt. 695\nWest Leila, KY 06117	+1 (409) 608-8926	https://via.placeholder.com/640x480.png/00dddd?text=cum	Totam aspernatur sed et vel omnis voluptatem animi. Culpa in eius earum esse ut excepturi. Ipsa tenetur vel animi dolorem ut sunt dolorem vero. Earum rerum voluptas porro quibusdam veritatis. Ad atque ratione sunt voluptatum.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
7	Trent Hackett	hodkiewicz.kailey@example.org	71903 Bartell Summit\nNew Marcus, SC 42668	1-484-568-2165	https://via.placeholder.com/640x480.png/005511?text=eligendi	Nihil facilis expedita recusandae totam odio dolore dolore. Similique necessitatibus dolor temporibus et quam. Error vel voluptas non dolorem itaque dolores et.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
8	Dr. Roberto Hermann DVM	ofelia87@example.com	77280 Tremblay Brook\nSouth Weldon, MO 84608	+16237257055	https://via.placeholder.com/640x480.png/0033aa?text=iure	Placeat qui omnis quidem et sit consequuntur facilis aut. Dignissimos fuga ad commodi ipsa molestiae est ut. Et vel accusamus autem accusantium repellat.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
9	Sheldon Dickens I	vella80@example.com	345 Dagmar Overpass\nMarcellusstad, IN 40625	+1.929.640.2395	https://via.placeholder.com/640x480.png/00eecc?text=ea	Aliquam odit et eos quidem ex ut et. Velit voluptas deserunt molestias sed repellat provident. Sed occaecati cum laborum error sint est.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
10	Tyrese Johns	hheathcote@example.net	73213 Hills Turnpike\nBrekkefurt, NH 99894-5578	1-443-637-5517	https://via.placeholder.com/640x480.png/0033dd?text=nobis	Consectetur non quis quia qui ad iure. Asperiores qui consequuntur dolor quis. Ea quam sit sit voluptas.	active	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.comments (id, user_id, name, email, content, commentable_id, commentable_type, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: contacts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contacts (id, name, email, subject, message, created_at, updated_at, phone) FROM stdin;
\.


--
-- Data for Name: countries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.countries (id, name, short_name, flag_img, country_code, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: destinations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.destinations (id, title, image, rating, button_text, status, button_link, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: employer_job_requests; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.employer_job_requests (id, fname, lname, email, phone, company_name, web_url, industry, location, "position", openings, salary_range, job_description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: employer_profiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.employer_profiles (id, user_id, company_name, contact_person, email, phone, country, city, company_details, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: faqs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.faqs (id, title, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: featured_services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.featured_services (id, service_id, sort_order, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: frontends; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.frontends (id, about_us_title, about_us_description, about_us_value, about_us_value_description, contact_us_email, contact_us_address, contact_us_number, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: gallery_albums; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.gallery_albums (id, title, type, url, client_id, status, created_at, updated_at, slug) FROM stdin;
1	License and Certificates	image	\N	\N	Active	2026-03-30 18:07:38	2026-03-30 18:07:38	license-and-certificates
2	Organizational Chart	image	\N	\N	Active	2026-03-31 02:35:27	2026-03-31 02:35:27	organizational-chart
\.


--
-- Data for Name: gallery_media; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.gallery_media (id, gallery_album_id, media_path, status, created_at, updated_at) FROM stdin;
7	1	images/gallery-media/1774924107_0.jpg	Active	2026-03-31 02:28:27	2026-03-31 02:28:27
8	1	images/gallery-media/1774924107_1.jpg	Active	2026-03-31 02:28:27	2026-03-31 02:28:27
9	1	images/gallery-media/1774924107_2.jpg	Active	2026-03-31 02:28:27	2026-03-31 02:28:27
10	1	images/gallery-media/1774924107_3.jpg	Active	2026-03-31 02:28:27	2026-03-31 02:28:27
11	2	images/gallery-media/1774924527_0.jpg	Active	2026-03-31 02:35:27	2026-03-31 02:35:27
\.


--
-- Data for Name: home_slides; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.home_slides (id, image, title, shortdesc, link_text, link_url, status, created_at, updated_at) FROM stdin;
1	test.jpg	neque	Amet eum illo labore omnis repellendus asperiores quisquam. Vitae ut perferendis dolor.	incidunt	itaque	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
2	test.jpg	repudiandae	Provident ipsam mollitia autem incidunt aut quia veniam quas. Expedita aliquam at repudiandae dolorem esse. Vel minus labore doloribus vero et sed.	cupiditate	veniam	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
3	test.jpg	rerum	Soluta aspernatur aliquid quia est. Ea aut velit quas nostrum ut vel iure. Ipsam nemo facilis possimus porro sint nesciunt similique.	odio	est	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
4	test.jpg	et	Quisquam tempora aut deleniti maiores fugit officia natus autem. Hic qui perspiciatis quia molestiae voluptatum. Accusamus ipsa ea ullam laboriosam vel praesentium labore.	consequatur	natus	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
5	test.jpg	animi	Quis repellendus voluptas odio sunt tempore. Est voluptatem voluptas quisquam. Inventore autem quia quas ut.	vel	reiciendis	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: itineraries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.itineraries (id, tour_package_id, day_number, status, title, "order", description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: job_applications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_applications (id, job_id, job_seeker_profile_id, name, email, phone, resume_file, bio, desired_role, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: job_categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_categories (id, name, image, icon_class, description, slug, created_at, updated_at) FROM stdin;
1	Logistics	\N	icon-15	Drivers, Trailer, Crane Operators, Excavator Operators, Mechanics (Diesel & Petrol)	logistics	2026-03-30 18:07:38	2026-03-30 18:07:38
2	Construction	\N	icon-11	Engineers, Surveyor, Quantity Surveyor, Safety Officers, Supervisors, Foreman, Electricians, Masons, Carpenters, Helpers, and more.	construction	2026-03-30 18:07:38	2026-03-30 18:07:38
3	Hospitality	\N	icon-10	Managers, Accountants, Secretaries, Waiters, Cooks, Cashiers, Housekeepers, Marketing Executives, and more.	hospitality	2026-03-30 18:07:38	2026-03-30 18:07:38
4	Technician	\N	icon-11	Plant Technician, Chiller Plant Technician, A/C Technician, Materials & Concrete Technician, Duct Technician.	technician	2026-03-30 18:07:38	2026-03-30 18:07:38
5	Security Guards	\N	icon-16	Security Officers, Supervisors, Guards, Watchmen, and other security personnel.	security-guards	2026-03-30 18:07:38	2026-03-30 18:07:38
6	Manufacturing	\N	icon-11	Production Operators, Factory Labour, and related manufacturing roles.	manufacturing	2026-03-30 18:07:38	2026-03-30 18:07:38
\.


--
-- Data for Name: job_category_job; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_category_job (id, job_id, job_category_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: job_category_vacancy; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_category_vacancy (id, vacancy_id, job_category_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
4	1	4	\N	\N
5	1	5	\N	\N
6	1	6	\N	\N
\.


--
-- Data for Name: job_seeker_profiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_seeker_profiles (id, user_id, bio, skills, experience, education, resume_file, name, email, phone, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, employer_id, vacancy_id, title, description, requirements, location, slug, "order", salary, status, image, pdf, link, icon_class, our_country_id, created_at, updated_at, interview_date, job_code, custom_company_name, male_opening, female_opening, total_openings) FROM stdin;
1	\N	1	title	\N	\N	\N	title	\N	3433	Active	\N	\N	\N	\N	\N	2026-03-30 18:10:34	2026-03-30 18:10:34	\N	\N	\N	0	0	12
3	\N	1	male	\N	\N	\N	male	\N	20000	Active	\N	\N	\N	\N	\N	2026-03-30 18:19:34	2026-03-30 18:19:34	2026-03-31	\N	\N	12	14	26
4	\N	1	title	\N	\N	\N	title	\N	23	Active	\N	\N	\N	\N	\N	2026-03-30 18:47:38	2026-03-30 18:47:38	2026-03-31	\N	\N	0	0	20
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_reset_tokens_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2021_03_30_092516_create_countries_table	1
6	2021_03_30_112259_create_states_table	1
7	2024_07_25_022222_create_our_countries_table	1
8	2024_11_10_111423_create_frontends_table	1
9	2024_11_12_152751_create_home_slides_table	1
10	2024_11_13_093044_create_testimonials_table	1
11	2024_11_14_041445_create_categories_table	1
12	2024_11_14_070148_create_posts_table	1
13	2024_11_14_070149_create_post_images_table	1
14	2024_11_14_133508_create_comments_table	1
15	2024_11_20_074827_create_settings_table	1
16	2024_11_20_105714_create_working_days_table	1
17	2024_11_27_112004_create_contacts_table	1
18	2024_12_09_060442_create_notices_table	1
19	2025_03_17_010519_create_services_table	1
20	2025_03_17_010836_create_featured_services_table	1
21	2025_04_04_154027_create_clients_table	1
22	2025_04_04_175717_add_about_image_to_settings_table	1
23	2025_04_05_102655_add_google_id_to_users_table	1
24	2025_04_07_161805_create_gallery_albums_table	1
25	2025_04_07_161813_create_gallery_media_table	1
26	2025_04_16_071451_create_page_banners_table	1
27	2025_05_01_083853_create_call_to_actions_table	1
28	2025_05_19_021701_create_pages_table	1
29	2025_06_05_075428_create_service_queries_table	1
30	2025_06_17_075224_create_destinations_table	1
31	2025_06_30_063898_create_tour_package_types_table	1
32	2025_06_30_063901_create_tour_packages_table	1
33	2025_06_30_064536_create_itineraries_table	1
34	2025_06_30_064553_create_tour_package_images_table	1
35	2025_06_30_064603_create_tour_package_videos_table	1
36	2025_06_30_065331_create_tour_faqs_table	1
37	2025_07_07_090541_create_tour_package_services_table	1
38	2025_07_09_024213_create_tour_package_types_table	1
39	2025_07_16_233124_add_is_featured_to_tour_packages_table	1
40	2025_07_17_001129_create_price_includes_table	1
41	2025_07_21_072823_add_views_to_posts_table	1
42	2025_07_21_084135_add_order_to_tour_packages_table	1
43	2025_07_21_100708_add_order_to_users_table	1
44	2025_07_22_201509_create_banner_slider_videos_table	1
45	2025_07_23_061208_create_tour_batches_table	1
46	2025_07_24_035041_create_package_bookings_table	1
47	2025_07_26_084459_create_achievements_table	1
48	2025_07_28_103901_create_tags_table	1
49	2025_07_28_165435_create_category_posts_table	1
50	2025_07_28_170325_create_post_tag_table	1
51	2025_08_01_072944_add_parent_id_to_packages_table	1
52	2025_08_03_090248_modify_short_desc_columns_in_pages_table	1
53	2025_08_03_091731_add_content_heading_to_pages_table	1
54	2025_08_04_221129_add_tour_package_type_id_to_tour_packages_table	1
55	2025_08_06_073948_add_slug_to_gallery_albums_table	1
56	2025_08_08_094237_create_newsletter_subscribers_table	1
57	2025_08_08_192538_add_trip_traking_sys_info_payment_soft_deletes_to_package_bookings_table	1
58	2025_08_09_042733_add_url_to_notices_table	1
59	2025_08_09_093051_add_status_to_achievements_table	1
60	2025_08_10_083706_modify_subject_of_contacts_table	1
61	2025_08_11_075404_add_column_phone_to_contacts_table	1
62	2025_08_13_070526_create_faqs_table	1
63	2025_08_16_073247_create_job_seeker_profiles_table	1
64	2025_08_16_073300_create_employer_profiles_table	1
65	2025_08_16_073812_create_job_categories_table	1
66	2025_08_16_180058_create_vacancies_table	1
67	2025_08_17_070416_create_section_categories_table	1
68	2025_08_17_070443_create_section_contents_table	1
69	2025_08_17_073135_create_jobs_table	1
70	2025_08_17_073228_create_applications_table	1
71	2025_08_17_073900_create_job_category_job_table	1
72	2025_08_17_073900_create_job_category_vacancy_table copy	1
73	2025_08_19_101821_create_section_category_images_table	1
74	2025_10_15_060406_add_interview_date_to_jobs_table	1
75	2025_10_15_061435_add_job_code_to_jobs_table	1
76	2025_10_15_061928_add_custom_company_name_to_jobs_table	1
77	2025_10_15_062948_add_openings_to_jobs_table	1
78	2025_10_15_074202_create_employer_job_requests_table	1
79	2025_10_17_081309_create_job_applications_table	1
\.


--
-- Data for Name: newsletter_subscribers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.newsletter_subscribers (id, email, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: notices; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.notices (id, title, image, description, status, created_at, updated_at, url) FROM stdin;
\.


--
-- Data for Name: our_countries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.our_countries (id, name, slug, description, created_at, updated_at) FROM stdin;
1	Afghanistan	afghanistan	AF	2026-03-30 18:07:38	2026-03-30 18:07:38
2	Albania	albania	AL	2026-03-30 18:07:38	2026-03-30 18:07:38
3	Algeria	algeria	DZ	2026-03-30 18:07:38	2026-03-30 18:07:38
4	Andorra	andorra	AD	2026-03-30 18:07:38	2026-03-30 18:07:38
5	Angola	angola	AO	2026-03-30 18:07:38	2026-03-30 18:07:38
6	Argentina	argentina	AR	2026-03-30 18:07:38	2026-03-30 18:07:38
7	Armenia	armenia	AM	2026-03-30 18:07:38	2026-03-30 18:07:38
8	Australia	australia	AU	2026-03-30 18:07:38	2026-03-30 18:07:38
9	Austria	austria	AT	2026-03-30 18:07:38	2026-03-30 18:07:38
10	Azerbaijan	azerbaijan	AZ	2026-03-30 18:07:38	2026-03-30 18:07:38
11	Bangladesh	bangladesh	BD	2026-03-30 18:07:38	2026-03-30 18:07:38
12	Belgium	belgium	BE	2026-03-30 18:07:38	2026-03-30 18:07:38
13	Bhutan	bhutan	BT	2026-03-30 18:07:38	2026-03-30 18:07:38
14	Brazil	brazil	BR	2026-03-30 18:07:38	2026-03-30 18:07:38
15	Bulgaria	bulgaria	BG	2026-03-30 18:07:38	2026-03-30 18:07:38
16	Canada	canada	CA	2026-03-30 18:07:38	2026-03-30 18:07:38
17	China	china	CN	2026-03-30 18:07:38	2026-03-30 18:07:38
18	Colombia	colombia	CO	2026-03-30 18:07:38	2026-03-30 18:07:38
19	Croatia	croatia	HR	2026-03-30 18:07:38	2026-03-30 18:07:38
20	Czech Republic	czech-republic	CZ	2026-03-30 18:07:38	2026-03-30 18:07:38
21	Denmark	denmark	DK	2026-03-30 18:07:38	2026-03-30 18:07:38
22	Egypt	egypt	EG	2026-03-30 18:07:38	2026-03-30 18:07:38
23	Finland	finland	FI	2026-03-30 18:07:38	2026-03-30 18:07:38
24	France	france	FR	2026-03-30 18:07:38	2026-03-30 18:07:38
25	Germany	germany	DE	2026-03-30 18:07:38	2026-03-30 18:07:38
26	Greece	greece	GR	2026-03-30 18:07:38	2026-03-30 18:07:38
27	Hong Kong	hong-kong	HK	2026-03-30 18:07:38	2026-03-30 18:07:38
28	Hungary	hungary	HU	2026-03-30 18:07:38	2026-03-30 18:07:38
29	India	india	IN	2026-03-30 18:07:38	2026-03-30 18:07:38
30	Indonesia	indonesia	ID	2026-03-30 18:07:38	2026-03-30 18:07:38
31	Iran	iran	IR	2026-03-30 18:07:38	2026-03-30 18:07:38
32	Iraq	iraq	IQ	2026-03-30 18:07:38	2026-03-30 18:07:38
33	Ireland	ireland	IE	2026-03-30 18:07:38	2026-03-30 18:07:38
34	Italy	italy	IT	2026-03-30 18:07:38	2026-03-30 18:07:38
35	Japan	japan	JP	2026-03-30 18:07:38	2026-03-30 18:07:38
36	Jordan	jordan	JO	2026-03-30 18:07:38	2026-03-30 18:07:38
37	Kazakhstan	kazakhstan	KZ	2026-03-30 18:07:38	2026-03-30 18:07:38
38	Kenya	kenya	KE	2026-03-30 18:07:38	2026-03-30 18:07:38
39	Korea, South	korea-south	KR	2026-03-30 18:07:38	2026-03-30 18:07:38
40	Kuwait	kuwait	KW	2026-03-30 18:07:38	2026-03-30 18:07:38
41	Lebanon	lebanon	LB	2026-03-30 18:07:38	2026-03-30 18:07:38
42	Malaysia	malaysia	MY	2026-03-30 18:07:38	2026-03-30 18:07:38
43	Mexico	mexico	MX	2026-03-30 18:07:38	2026-03-30 18:07:38
44	Nepal	nepal	NP	2026-03-30 18:07:38	2026-03-30 18:07:38
45	Netherlands	netherlands	NL	2026-03-30 18:07:38	2026-03-30 18:07:38
46	New Zealand	new-zealand	NZ	2026-03-30 18:07:38	2026-03-30 18:07:38
47	Nigeria	nigeria	NG	2026-03-30 18:07:38	2026-03-30 18:07:38
48	Norway	norway	NO	2026-03-30 18:07:38	2026-03-30 18:07:38
49	Pakistan	pakistan	PK	2026-03-30 18:07:38	2026-03-30 18:07:38
50	Philippines	philippines	PH	2026-03-30 18:07:38	2026-03-30 18:07:38
51	Poland	poland	PL	2026-03-30 18:07:38	2026-03-30 18:07:38
52	Portugal	portugal	PT	2026-03-30 18:07:38	2026-03-30 18:07:38
53	Qatar	qatar	QA	2026-03-30 18:07:38	2026-03-30 18:07:38
54	Romania	romania	RO	2026-03-30 18:07:38	2026-03-30 18:07:38
55	Russia	russia	RU	2026-03-30 18:07:38	2026-03-30 18:07:38
56	Saudi Arabia	saudi-arabia	SA	2026-03-30 18:07:38	2026-03-30 18:07:38
57	Singapore	singapore	SG	2026-03-30 18:07:38	2026-03-30 18:07:38
58	South Africa	south-africa	ZA	2026-03-30 18:07:38	2026-03-30 18:07:38
59	Spain	spain	ES	2026-03-30 18:07:38	2026-03-30 18:07:38
60	Sri Lanka	sri-lanka	LK	2026-03-30 18:07:38	2026-03-30 18:07:38
61	Sweden	sweden	SE	2026-03-30 18:07:38	2026-03-30 18:07:38
62	Switzerland	switzerland	CH	2026-03-30 18:07:38	2026-03-30 18:07:38
63	Syria	syria	SY	2026-03-30 18:07:38	2026-03-30 18:07:38
64	Taiwan	taiwan	TW	2026-03-30 18:07:38	2026-03-30 18:07:38
65	Thailand	thailand	TH	2026-03-30 18:07:38	2026-03-30 18:07:38
66	Turkey	turkey	TR	2026-03-30 18:07:38	2026-03-30 18:07:38
67	Ukraine	ukraine	UA	2026-03-30 18:07:38	2026-03-30 18:07:38
68	United Arab Emirates	united-arab-emirates	AE	2026-03-30 18:07:38	2026-03-30 18:07:38
69	United Kingdom	united-kingdom	GB	2026-03-30 18:07:38	2026-03-30 18:07:38
70	United States	united-states	US	2026-03-30 18:07:38	2026-03-30 18:07:38
71	Vietnam	vietnam	VN	2026-03-30 18:07:38	2026-03-30 18:07:38
72	Yemen	yemen	YE	2026-03-30 18:07:38	2026-03-30 18:07:38
\.


--
-- Data for Name: package_bookings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.package_bookings (id, user_id, email, name, phone, country, message, children, adult, total_people, price, tour_package_id, tour_batch_id, custom_date, booking_type, status, created_at, updated_at, special_requests, payment_status, amount_paid, currency, trip_start_date, trip_end_date, is_archived, booking_reference, ip_address, user_agent, confirmed_at, cancelled_at, deleted_at) FROM stdin;
\.


--
-- Data for Name: package_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.package_types (id, title, short_desc, description, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: page_banners; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.page_banners (id, title, sub_heading, description, page, section, status, image, created_at, updated_at) FROM stdin;
1	\N	\N	\N	all	banner	Active	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
2	\N	\N	\N	home	banner	Active	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
3	\N	\N	\N	gallery	banner	Active	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
4	\N	\N	\N	blog	banner	Active	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
5	\N	\N	\N	contact	banner	Active	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
6	\N	\N	\N	about	banner	Active	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
7	\N	\N	\N	services	banner	Active	\N	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: pages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pages (id, title, slug, content, meta_title, meta_description, meta_keywords, title1, title2, short_desc1, short_desc2, desc1, desc2, image1, image2, video1, video2, gallery_images, created_at, updated_at, content_heading, content_subheading) FROM stdin;
1	home_blog_section	home_blog_section	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
2	home_section_1	home_section_1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
3	home_section_2	home_section_2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
4	gallery	gallery	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
5	blog	blog	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
6	contact	contact	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
7	about	about	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
8	services	services	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
9	packages	packages	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
10	why_us	why_us	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
11	mission_vision	mission_vision	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
12	mission	mission	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
13	vision	vision	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
14	testimonial	testimonial	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
15	counter	counter	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
16	Message from Chairman	message-from-chairman	Aurora Human Resource (p) ltd is extremely happy to introduce our reputation and credibility in the international recruitment field in sourcing Nepalese human resources, and consequently request you to appoint us as your recruitment agent.\n\nWe take huge pride in our collaborative approach and experienced techniques in delivering high impact in this field. The results have not only led the company towards success in a short span of time but also earned a strong foundation of client partnership that has turned into long friendships.\n\nWe provide qualified, energetic, experienced, hardworking, honest, and sincere Nepali manpower to foreign countries including Malaysia, Japan, Oman, Bahrain, and other government-recognized countries to support deserving candidates to their respective employer destinations with utmost enthusiasm and responsibility. We thank our valued clients for their co-operation and support.\n\nMr. Rajendra Bhandari\nChairman	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2026-03-30 18:07:38	2026-03-30 18:07:38	\N	\N
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: post_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.post_images (id, post_id, image, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: post_tag; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.post_tag (id, post_id, tag_id, created_at, updated_at) FROM stdin;
1	1	5	2026-03-30 18:07:37	2026-03-30 18:07:37
2	1	7	2026-03-30 18:07:37	2026-03-30 18:07:37
3	2	6	2026-03-30 18:07:37	2026-03-30 18:07:37
4	2	7	2026-03-30 18:07:37	2026-03-30 18:07:37
5	2	5	2026-03-30 18:07:37	2026-03-30 18:07:37
6	3	5	2026-03-30 18:07:37	2026-03-30 18:07:37
7	4	4	2026-03-30 18:07:37	2026-03-30 18:07:37
8	5	3	2026-03-30 18:07:37	2026-03-30 18:07:37
9	5	4	2026-03-30 18:07:37	2026-03-30 18:07:37
10	5	9	2026-03-30 18:07:37	2026-03-30 18:07:37
11	6	7	2026-03-30 18:07:37	2026-03-30 18:07:37
12	6	5	2026-03-30 18:07:37	2026-03-30 18:07:37
13	6	8	2026-03-30 18:07:37	2026-03-30 18:07:37
14	7	10	2026-03-30 18:07:37	2026-03-30 18:07:37
15	7	6	2026-03-30 18:07:37	2026-03-30 18:07:37
16	8	1	2026-03-30 18:07:37	2026-03-30 18:07:37
17	8	5	2026-03-30 18:07:37	2026-03-30 18:07:37
18	9	2	2026-03-30 18:07:37	2026-03-30 18:07:37
19	10	8	2026-03-30 18:07:37	2026-03-30 18:07:37
20	10	1	2026-03-30 18:07:37	2026-03-30 18:07:37
21	10	7	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.posts (id, title, slug, description, created_by, updated_by, status, created_at, updated_at, views) FROM stdin;
1	Nemo vero inventore dolorem qui.	nemo-vero-inventore-dolorem-qui	Dignissimos odio omnis fuga aut autem. Reiciendis voluptatem deserunt voluptas saepe dolorum minus qui. Et est dolor iste ab corporis.\n\nA eum ut aut non itaque dolorum aliquid. Expedita magnam enim repudiandae laborum aut officiis placeat. Non distinctio quas eius corporis assumenda molestiae ut laborum.\n\nDeserunt recusandae est vitae ut cumque. Dolorem sed laborum quod aut nobis dolore. Eveniet dolor dicta incidunt non.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
2	Molestias voluptate aspernatur cupiditate.	molestias-voluptate-aspernatur-cupiditate	Dicta quia quas quis commodi sed error qui omnis. Enim quia ut exercitationem quod error error. Unde error autem ea voluptatibus libero.\n\nNon at nihil sit adipisci. Veritatis illum amet quo odit. Hic dolore facere voluptas sit.\n\nAut libero provident sequi corporis. Aut et temporibus numquam. Consequatur hic aut officiis eum. Facilis praesentium ullam tenetur omnis tempore atque.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
3	Deserunt minus nobis sunt officiis dolor dicta possimus.	deserunt-minus-nobis-sunt-officiis-dolor-dicta-possimus	Quod a quis rem totam aliquam. Culpa reiciendis repellat eos et id. Asperiores iste maiores quos magnam nam.\n\nLaudantium eligendi omnis facere. Inventore cum ut explicabo. Ex quia non soluta laboriosam iure dicta tempore. Aliquam minus repellat harum velit aspernatur.\n\nIpsam nihil et porro eligendi. Ipsa occaecati ut aut in velit nihil ad. Occaecati qui explicabo vel id reiciendis quo labore cumque.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
4	Blanditiis nihil iusto quam.	blanditiis-nihil-iusto-quam	Totam vel odit temporibus impedit. Incidunt doloribus animi sit. Architecto officia fugit voluptates et sunt dignissimos. Corporis architecto similique repellendus quos error omnis cupiditate.\n\nQui sint officiis magnam quod. Debitis commodi dolore itaque amet aut aliquam minus illum. Officia ipsa sunt libero voluptas aut qui.\n\nLaboriosam vero vero a voluptate. Quae beatae laboriosam qui necessitatibus est eius voluptatibus earum. Labore veritatis quae excepturi dolores ut aliquid. Tempora voluptas debitis voluptate quis commodi ut sed.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
5	Voluptas incidunt minima ut qui.	voluptas-incidunt-minima-ut-qui	Voluptas nostrum ea et ut molestias nesciunt ut. Rerum fugiat repellat atque sunt. Doloribus sit totam omnis. Laboriosam quo consequatur consequatur quia.\n\nEa ex quos est provident perferendis dignissimos quod. Et minima dolores a possimus. Soluta nam praesentium dicta nostrum non. Harum incidunt est molestiae rem itaque neque perspiciatis.\n\nConsequuntur ea corrupti alias. Ut et architecto laborum ab debitis autem iste. Magni excepturi voluptatem asperiores officiis aut nihil nisi. Sint consectetur in rerum ipsam explicabo omnis.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
6	Accusamus nobis autem amet.	accusamus-nobis-autem-amet	Et consequatur quam libero. Expedita consequatur sit eum eum beatae reiciendis est. Tempore ut et alias voluptatem repellendus. Dolorum fugit aut quis cupiditate aut corporis pariatur nihil.\n\nId in qui aspernatur nostrum error ut et. Vel molestiae possimus expedita est qui quasi recusandae. Eos sunt quis blanditiis quasi quis.\n\nNihil labore ducimus aut delectus minus delectus eveniet vel. Maxime nulla cum amet. Quisquam ut incidunt minima in praesentium.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
7	Dolores et est voluptatem laborum quam earum.	dolores-et-est-voluptatem-laborum-quam-earum	Aut laudantium provident neque sapiente at minus. Quam expedita omnis quia repudiandae commodi minus in. Asperiores delectus est consequatur reiciendis.\n\nNon explicabo in porro officia. Saepe ipsam quis et pariatur. Est iste impedit sint.\n\nFacere consequatur aut consequatur. Non voluptas voluptatum in hic consequatur dicta. Animi recusandae cum dolores et sapiente deleniti nulla.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
8	Facere commodi exercitationem dolor et sint quo.	facere-commodi-exercitationem-dolor-et-sint-quo	Excepturi sit qui sed qui id consequatur. Excepturi et voluptatum in voluptatem. Harum cum quia qui nemo laudantium. Omnis incidunt et sapiente sunt consequatur eos quas. Est non perferendis necessitatibus sed quia eligendi.\n\nEt ut iusto pariatur atque consectetur ducimus enim. In aut consectetur nihil ut tempore nostrum praesentium. Quos repellendus pariatur iusto eveniet est veritatis. Ipsam velit provident vero.\n\nCulpa asperiores sit harum et debitis nihil. Sed ab repellat sint natus saepe sapiente. Ut minus sint odit quos.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
9	Rerum qui occaecati vero mollitia.	rerum-qui-occaecati-vero-mollitia	Et excepturi eveniet aut aspernatur harum rem. Sint at ullam consequuntur. Dolor est illum qui veniam temporibus voluptatem provident.\n\nLibero deserunt iste officia non necessitatibus dolor porro doloremque. Id nam at tempore qui voluptas. Et nemo quo laborum itaque iusto et neque.\n\nA quia omnis itaque et ut consequatur ipsum. Optio quo dolorem odio. Quis quae molestiae voluptatem eos explicabo laudantium nihil.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
10	Nulla illum est et est.	nulla-illum-est-et-est	Ducimus explicabo voluptate aut voluptatem libero. Possimus sit distinctio qui adipisci nobis. Officiis voluptatem illum nam neque eaque.\n\nSunt nam facere facere vel voluptas. Est totam nam omnis reprehenderit sed. Deleniti aliquid debitis eos modi voluptatem harum et. Vero expedita sed atque deserunt neque recusandae necessitatibus.\n\nQui sed adipisci esse. Veritatis nostrum itaque qui atque pariatur sequi fuga. Expedita similique dolores rerum ea placeat voluptas. Dolores quaerat aut quis voluptatem quos.	1	\N	Active	2026-03-30 18:07:37	2026-03-30 18:07:37	0
\.


--
-- Data for Name: price_includes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.price_includes (id, tour_package_id, title, price, is_included, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: section_categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.section_categories (id, title, sub_heading, image, video, slug, description, description2, status, created_at, updated_at) FROM stdin;
1	License and Certificates	Official licenses and certificates	\N	\N	license-and-certificates	Official licenses and certificates issued by authorized authorities.	These documents validate our legal operations and compliance.	Active	2026-03-30 18:07:38	2026-03-30 18:07:38
\.


--
-- Data for Name: section_category_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.section_category_images (id, section_category_id, image, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: section_contents; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.section_contents (id, section_category_id, title, short_description, "order", image, video, pdf, description, description2, icon_class, link_title, link_url, status, created_at, updated_at) FROM stdin;
1	1	Company-Registration	\N	1	images/sections/company-registration.jpg	\N	\N	\N	\N	\N	\N	\N	Active	2026-03-30 18:07:38	2026-03-30 18:07:38
2	1	Authorized Certificate From Government	\N	2	images/sections/authorized-certificate-from-government.jpg	\N	\N	\N	\N	\N	\N	\N	Active	2026-03-30 18:07:38	2026-03-30 18:07:38
3	1	License	\N	3	images/sections/license.jpg	\N	\N	\N	\N	\N	\N	\N	Active	2026-03-30 18:07:38	2026-03-30 18:07:38
4	1	Pan-Certificate	\N	4	images/sections/pan-certificate.jpg	\N	\N	\N	\N	\N	\N	\N	Active	2026-03-30 18:07:38	2026-03-30 18:07:38
5	1	Authorized Certificate From Japan	\N	5	images/sections/authorized-certificate-from-japan.jpg	\N	\N	\N	\N	\N	\N	\N	Active	2026-03-30 18:07:38	2026-03-30 18:07:38
6	1	Rba Participation	\N	6	images/sections/rba-participation.jpg	\N	\N	\N	\N	\N	\N	\N	Active	2026-03-30 18:07:38	2026-03-30 18:07:38
\.


--
-- Data for Name: service_queries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.service_queries (id, name, phone, email, message, service_id, created_at, updated_at) FROM stdin;
1	Louisa Blick	+1-463-580-2599	damaris.gibson@example.com	Deleniti expedita sunt vitae repudiandae.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
2	Marianna Fritsch	1-985-876-5449	mgrimes@example.org	Quas autem vel minima assumenda eos.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
3	Mr. Green Kozey DVM	+1 (908) 786-4919	gmayert@example.net	Similique itaque vero rerum explicabo ea excepturi et velit.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
4	Isabell Labadie	(754) 852-3796	roberts.madelyn@example.com	Deleniti soluta voluptatem magnam.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
5	Mathew Rogahn MD	+1-612-240-2576	rempel.robin@example.com	Et repudiandae atque voluptas sit voluptatibus eius sit.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
6	Annette Bogisich	1-207-925-1689	evangeline.macejkovic@example.net	Cupiditate molestias odio ad sed ex vel aut.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
7	Claudia Watsica DVM	+15405237884	hirthe.alexander@example.org	Qui delectus aperiam est ipsa illo.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
8	Dashawn O'Connell	601-763-4939	olen.cremin@example.com	Beatae amet rerum vitae quia.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
9	Dr. Ines Hintz	1-402-538-6752	uwalsh@example.org	Corrupti voluptas eligendi fugiat dolores accusamus sed quisquam blanditiis.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
10	Jaylin Hirthe III	+16783466411	bschowalter@example.com	Voluptatem illum qui consequuntur est odit in.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
11	Dr. Cydney West	(928) 673-0301	deon74@example.com	Ut officia quae quo qui quod et.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
12	Mr. Geovanni Gleichner PhD	1-641-893-8747	jerry.bergstrom@example.net	Maiores debitis enim exercitationem consectetur labore.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
13	Jerod Thiel II	+1-475-684-5351	lauriane.kreiger@example.net	Doloremque soluta sint sequi et repellendus libero quae.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
14	Rosella Stamm	(726) 764-1308	willa39@example.net	Excepturi velit aut et iusto alias nostrum occaecati ex.	1	2026-03-30 18:07:37	2026-03-30 18:07:37
15	Zoie Gusikowski	(279) 814-0694	scot36@example.net	Aut facilis aut autem voluptates sit impedit.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
16	Dr. Anita Watsica IV	773-591-7559	pmccullough@example.com	Quisquam ut consectetur quod culpa iure sed iusto.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
17	Dr. Hassan Lakin	1-276-943-1504	zwelch@example.org	Sunt est laboriosam error voluptatibus provident similique.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
18	Anahi Jenkins	+1-401-595-1771	juliana63@example.net	Rerum dolor animi sed quia quisquam itaque delectus.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
19	Prof. Pierce Cummings V	+1.267.321.1502	treva90@example.net	Omnis dolor dolor sequi nostrum esse qui laborum sed.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
20	Sasha Mraz	1-813-303-0678	aheller@example.org	Velit magnam dolorem qui facere ut.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
21	Mrs. Verdie Haag DDS	1-612-275-4716	darion.parker@example.com	Totam quibusdam libero quo.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
22	Tiara Schmeler	(240) 955-9416	mkemmer@example.org	Beatae sunt quaerat quaerat voluptatum id.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
23	Prince Lubowitz	+13207337698	wava.gibson@example.com	Non dolore in tempora.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
24	Nikita Daniel DDS	534.679.5981	block.selina@example.com	Minima ex consectetur cupiditate dolorum.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
25	Erna Rodriguez	(651) 626-5806	rswaniawski@example.net	Qui magnam dolorum fugiat mollitia.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
26	Prof. Madilyn Cormier	1-217-279-0228	schmitt.velma@example.org	Magni quo qui quo omnis perferendis eos illum.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
27	Cristopher Cartwright	+1-813-449-7034	dibbert.missouri@example.org	Quibusdam voluptatem rerum qui non quia repellat.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
28	Electa Rutherford I	786.361.5082	gboehm@example.org	Culpa exercitationem atque accusantium numquam delectus amet dolorum.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
29	Mrs. Karianne Mayer V	(361) 776-6832	damore.jerald@example.net	Eum quibusdam quaerat atque quia cumque illum veniam totam.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
30	Carlie McKenzie	+1 (303) 446-9222	hessel.jeanie@example.net	Non autem veniam dolores ratione accusamus commodi non.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
31	Jody Roob I	209.679.0379	lockman.enoch@example.com	Dolorem aut labore suscipit nam beatae.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
32	Haven Marks	+1 (301) 529-3426	justen.jakubowski@example.net	Sit temporibus culpa dolores impedit in quod aut.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
33	Kareem Hintz	+1-202-501-7013	jada.kihn@example.com	Voluptatem voluptatem harum cum nisi earum.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
34	Thurman Bauch	423.556.9699	ettie66@example.net	Temporibus dolorem maxime voluptatum voluptatibus sed velit.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
35	Ariane Hessel	517.589.7974	watson53@example.org	Ut soluta ut culpa dolores tempora ea animi.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
36	Mrs. Destiny Ferry	1-864-612-5740	tremblay.arlo@example.com	Nulla facere beatae tempora eum ut totam possimus.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
37	Christophe Johnston	+1-571-986-1720	mnicolas@example.org	Exercitationem doloremque ex veritatis velit et velit ut.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
38	Kurt Shields	989-954-0537	rreynolds@example.org	Laboriosam deserunt dolores nostrum necessitatibus velit.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
39	Roel Rogahn	(540) 384-3795	hammes.salvador@example.net	Qui quia et voluptates reiciendis recusandae tempora.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
40	Devan Hettinger PhD	+14104426192	mcclure.marcia@example.org	Est pariatur ullam sed et quis dolores.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
41	Carley Homenick	+1.425.919.8868	giovanni07@example.org	Illum est aut ducimus recusandae doloribus dolorum.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
42	Garrick Bartell	(515) 618-4741	yolanda93@example.com	Ut voluptatem tempore modi aspernatur accusantium mollitia consectetur quis.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
43	Fernando Dietrich V	1-281-366-3914	tromp.werner@example.net	Consequatur rem accusamus occaecati voluptas animi.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
44	Mr. Brenden O'Kon	+1 (283) 865-4854	lea.nicolas@example.org	Animi occaecati molestiae consequatur repellat pariatur.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
45	Prof. Alberto Denesik	+18186015169	runolfsdottir.forrest@example.net	Qui animi voluptatem occaecati id.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
46	Lavern Legros	838.247.0746	myra95@example.org	Voluptas dicta sed non nesciunt.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
47	Austyn Wolff	+1-571-803-0247	bednar.erwin@example.net	Voluptatem atque dolores et commodi vitae veniam autem.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
48	Dorcas Stiedemann	865-700-6934	heaney.archibald@example.org	Laboriosam voluptatem quos ut.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
49	Roger Feest V	+1-231-648-0227	lempi.yost@example.com	Sunt vero dolor porro laudantium.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
50	Ruth Schaden	+17402711637	beulah78@example.org	Ut pariatur totam voluptatem quidem fugiat non.	1	2026-03-30 18:07:38	2026-03-30 18:07:38
\.


--
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.services (id, name, short_desc, description, status, price, created_at, updated_at, image) FROM stdin;
1	Logistics	Transport and vehicle operation services.	Drivers, Trailer, Crane Operators, Excavator Operators, Mechanics (Diesel & Petrol).	1	100	2026-03-30 18:07:37	2026-03-30 18:07:37	\N
2	Construction Engineer	Engineering and construction project roles.	Engineers, Surveyor, Quantity Surveyor, Safety Officers, Supervisors, Foreman, Electricians, Masons, Carpenters, Helpers, and more.	1	100	2026-03-30 18:07:37	2026-03-30 18:07:37	\N
3	Hospitality	Service industry and hotel management roles.	Managers, Accountants, Secretaries, Waiters, Cooks, Cashiers, Housekeepers, Marketing Executives, and more.	1	100	2026-03-30 18:07:37	2026-03-30 18:07:37	\N
4	Technician	Skilled technical and mechanical roles.	Plant Technician, Chiller Plant Technician, A/C Technician, Materials & Concrete Technician, Duct Technician.	1	100	2026-03-30 18:07:37	2026-03-30 18:07:37	\N
5	Security Guards	Security and surveillance services.	Security Officers, Supervisors, Guards, Watchmen, and other security personnel.	1	100	2026-03-30 18:07:37	2026-03-30 18:07:37	\N
6	Manufacturing	Production and factory-related work.	Production Operators, Factory Labour, and related manufacturing roles.	1	100	2026-03-30 18:07:37	2026-03-30 18:07:37	\N
\.


--
-- Data for Name: settings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.settings (id, logo, title, contact, email, address, description, work_description, facebook_url, twitter_url, github_url, instagram_url, created_at, updated_at, welcome_image, about_image) FROM stdin;
1	\N	Aurora	12345678	aurora@gmail.com	Patan Dhoka	Dolorum maxime temporibus et et provident earum illum perspiciatis. Et sed ea consectetur ut. Accusamus qui qui id sunt laudantium.	Possimus a sed ducimus. Saepe accusamus et qui non rerum omnis voluptates rem. Non modi praesentium ad officiis nostrum sapiente voluptas.	https://www.facebook.com/	https://en.wikipedia.org/wiki/Twitter	https://github.com	https://instagram.com	2026-03-30 18:07:37	2026-03-30 18:07:37	\N	\N
\.


--
-- Data for Name: states; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.states (id, country_id, name, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tags; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tags (id, name, created_at, updated_at) FROM stdin;
1	Nepal	2026-03-30 18:07:37	2026-03-30 18:07:37
2	Gulf Jobs	2026-03-30 18:07:37	2026-03-30 18:07:37
3	Skilled Workers	2026-03-30 18:07:37	2026-03-30 18:07:37
4	Manpower	2026-03-30 18:07:37	2026-03-30 18:07:37
5	Recruitment	2026-03-30 18:07:37	2026-03-30 18:07:37
6	Construction	2026-03-30 18:07:37	2026-03-30 18:07:37
7	Healthcare	2026-03-30 18:07:37	2026-03-30 18:07:37
8	Hospitality	2026-03-30 18:07:37	2026-03-30 18:07:37
9	Technology	2026-03-30 18:07:37	2026-03-30 18:07:37
10	Consulting	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: testimonials; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.testimonials (id, name, image, designation, address, description, status, created_at, updated_at) FROM stdin;
1	Duane Hamill	\N	Secondary School Teacher	466 Emilia Ranch Suite 990\nFaustofort, WY 53638-8445	Reiciendis dolor officiis et occaecati adipisci commodi. Molestiae aspernatur non tenetur rem. Labore ea laboriosam omnis voluptatem. Sint debitis exercitationem explicabo quo quia tenetur.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
2	Dr. Ransom Schumm DVM	\N	Nursing Aide	448 Christine Forges Suite 612\nBrentshire, AZ 65427-5248	Est ut in et itaque. Et sit voluptatem natus maxime vero. Repudiandae sint asperiores enim vel quam asperiores exercitationem dolore. Repellat non molestias nesciunt molestiae.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
3	Gideon Greenfelder	\N	Security Systems Installer OR Fire Alarm Systems Installer	2897 Richard Cove Suite 151\nLake Waltermouth, WA 07027-6331	Magnam sit cumque nemo. Est temporibus quam est voluptatibus sapiente est. Rerum autem sit beatae accusamus praesentium velit omnis.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
4	Anastasia Kulas	\N	Exhibit Designer	575 Mauricio Glen\nDannyburgh, AZ 67050-8332	Repellendus repellendus dolore voluptas reprehenderit ipsam tenetur tenetur. Ad eos voluptate tempore omnis voluptate. Hic reprehenderit ducimus et officia incidunt magni. A dolores rerum earum accusamus laborum et. Ut fugit eos cumque omnis nostrum sapiente voluptas.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
5	Ms. Joannie Prohaska	\N	Postal Clerk	5281 Jake Greens\nReesefurt, FL 36930-5177	Assumenda inventore quam sit et quia eos. Rerum sit soluta aut necessitatibus et. Et voluptate fugit molestiae optio sunt voluptatem. Aut fuga earum temporibus et corporis vero.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
6	Pearl Barton	\N	Special Education Teacher	4943 Wilkinson Stravenue\nEast Noemie, OK 48372	Quibusdam ut tempora voluptas voluptas expedita temporibus et. Excepturi officia vero sit quas cum dolor. Sunt quia nobis in cum dolore beatae. Reprehenderit eius quam aperiam sit molestiae accusantium provident.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
7	Prof. Norris Bogan	\N	Public Health Social Worker	3987 Schowalter Squares\nFaheyberg, HI 66654-2333	Enim deleniti iusto aspernatur quos enim. Aut sint asperiores officiis ea non ea. Nisi laborum doloremque omnis ut pariatur aut. Consequatur inventore temporibus non quae excepturi.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
8	Modesto Dare	\N	Surveyor	7758 Karen Parkways Suite 135\nSouth Stuartshire, ME 98054-2736	Quod maiores nulla molestiae voluptas quia. Qui quas ut ipsum et soluta neque. Vel possimus blanditiis nisi sint voluptatem. Eos praesentium voluptatem fuga dolorem. Laborum ut voluptates reiciendis non molestiae magnam.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
9	Miss Daphne Kohler PhD	\N	Mathematical Scientist	841 Quigley Forge\nLake Jaymehaven, MN 52431	Qui voluptas ab consequatur facere. Voluptatem dolorum consequuntur atque dolorum aperiam labore itaque. Corrupti quis odit qui sit aliquid explicabo. Voluptatem cupiditate dignissimos ullam molestiae odit consequatur.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
10	Mr. Ramiro Towne II	\N	Personal Financial Advisor	9390 Violet Mission Apt. 182\nStoltenbergshire, AZ 00149-6988	Non ipsam voluptas non magni qui repellat. Vel quam nesciunt rerum maxime reiciendis aut.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
11	Lisandro Bergstrom	\N	Tailor	3105 Brown Ramp\nEvertmouth, KS 31735	Sit qui in quia occaecati ea nam molestiae. Eos ullam odio eum id officiis et voluptatibus. Non praesentium quisquam possimus deleniti ea. Omnis iusto ratione ea est asperiores earum blanditiis.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
12	Arturo Pagac	\N	Project Manager	41309 Blanda Freeway\nAlysaside, NM 68913	Qui aut labore iusto cumque illum laudantium ut. Laboriosam blanditiis dolorem ipsam saepe tempora rerum a. Corporis et ipsum modi numquam.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
13	Carrie Gutkowski	\N	Human Resources Assistant	47664 Elise Corner\nMableside, MD 87738	Tempore earum vero possimus omnis consequatur aut aut. Commodi rem maiores incidunt illum ut perferendis.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
14	Prof. Griffin Wunsch DVM	\N	Forester	26696 Jerde Ville Suite 809\nLake Jarenfort, NY 34719-4430	Eligendi consequuntur necessitatibus pariatur. Et sit nam voluptatem nihil exercitationem est. Qui aut minus iure sit quia ut accusamus.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
15	Winston Rath	\N	Fish Game Warden	2348 Dare Roads\nHagenesfort, MT 10863	Cupiditate vel autem aut explicabo culpa aspernatur illum. In mollitia placeat magnam delectus nihil. Maiores officiis eligendi adipisci ipsa et sit. Non ea est sint vel dignissimos iusto quia quis.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
16	Prof. Branson Marquardt PhD	\N	Roof Bolters Mining	1045 Ritchie Shores\nLuettgenfurt, KY 35817	Qui molestiae et omnis. Voluptate sit voluptatem atque iusto voluptatem quis nihil. Vero aut recusandae nobis magnam assumenda laudantium ea.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
17	Louie Stracke	\N	System Administrator	906 Johnson Mill Apt. 615\nWest Porterstad, OR 58636	Qui corporis tempora maiores velit consequatur. Molestiae voluptatum esse aut blanditiis est enim. Consequatur explicabo libero sint tenetur aut enim consequatur.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
18	Tessie Schumm	\N	Metal-Refining Furnace Operator	620 Leopoldo Glens\nWalshmouth, KS 20693-7529	Sunt accusantium voluptatem delectus ut voluptatibus adipisci qui. Et perferendis exercitationem nihil dolore et laboriosam aut. Tempore facere beatae numquam quod.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
19	Mr. Lafayette Muller PhD	\N	Forest Fire Fighter	1858 Pierce Hills Apt. 523\nPort Kaitlynport, KS 11739-1084	Soluta nihil iure et. Labore excepturi qui quia assumenda.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
20	Enoch Morar	\N	Locker Room Attendant	35263 Berge Mission Apt. 788\nGerholdtown, ME 92646-8030	Maxime similique quia minima minima assumenda et molestiae. Molestiae et voluptas quibusdam et et quo. Reprehenderit vel magni voluptate voluptatem nihil dignissimos.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
21	Prof. Deja Fadel	\N	Brickmason	356 Maiya Manor Apt. 291\nEmmittburgh, WY 01382-5176	Ea quis sed hic aspernatur provident ut. Praesentium eos ut veritatis voluptas natus eos cum. Explicabo sit officia illo voluptas et dolorum sed. Aliquid sit alias soluta iste.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
22	Addie Wiza	\N	Surveying Technician	4368 Jaskolski Drive Suite 672\nWest Andybury, OR 20123	Consequatur maxime eum et sed sapiente vel. Vel culpa ut autem ipsum eum libero aut. Adipisci aperiam non fuga impedit delectus est.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
23	Cedrick Connelly	\N	Software Engineer	3134 Meaghan Village Suite 526\nAbeltown, KS 55338	Magnam sit suscipit in. Vel et dolorem vel quis illo. Iusto minima qui sequi molestias blanditiis cum facilis et.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
24	Dr. Hermina Donnelly II	\N	Forest and Conservation Worker	3004 Jacinthe Villages\nBatzshire, CT 79804-8508	Ab rerum ducimus assumenda dolor sed reiciendis et illum. At laboriosam eaque quia ut magnam consequatur molestias. Qui reiciendis nihil enim voluptatem blanditiis excepturi maxime.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
25	Teagan Zemlak	\N	Auditor	77385 Imelda Springs\nNew Rahulmouth, CO 73593	Quia quisquam repellat et. Dolores occaecati quia dolorem voluptatem. Fugiat voluptas quis est velit et. Veniam dolor voluptatem dolorem sed.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
26	Eulah Bradtke PhD	\N	Fish Hatchery Manager	2376 Carlie Flat\nEast Johnnieside, TN 53155	Dicta laudantium et nisi harum similique quia itaque. Provident cum iste voluptatem quo nihil natus quia.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
27	Wade Schimmel	\N	Industrial Engineer	481 Brando Alley\nNorth Floyd, MI 14503	Et quaerat aut animi facere velit saepe. Quo hic et esse nihil dolor sit commodi. Voluptates qui nihil ipsam sunt sit doloremque placeat.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
28	Clifton Huels	\N	Coremaking Machine Operator	61218 Shyanne Station\nKacieberg, NV 08390-0931	Voluptate facere quos nam et quibusdam et. Voluptas qui quis aut nobis dolor minima eveniet ratione. Rerum in maiores optio earum suscipit doloremque.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
29	Dr. Freeman Jacobs Sr.	\N	Sound Engineering Technician	340 Hahn Village\nSouth Frederickview, PA 27818	Et sunt facilis omnis. Aliquid soluta consequuntur quia. Possimus et rerum consequatur nihil et consequatur aperiam. Et inventore laborum in quis voluptas ut quasi.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
30	Autumn Lebsack	\N	Transportation Equipment Maintenance	97071 Beaulah Forges\nLake Cordia, WV 85542	Quod ipsam ipsum in molestiae sunt ut. Molestias totam eius ut voluptatibus quaerat blanditiis est. Qui laborum voluptas dignissimos velit sapiente.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
31	Rebeca Legros	\N	Lifeguard	2229 Liliana Prairie\nWest Georgettebury, AK 16948	Non tempore deleniti fuga cumque sit ea ad. Quaerat voluptas quaerat doloribus doloremque quisquam pariatur velit. Et autem eligendi eaque magni cumque ipsum id.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
32	Ms. Kara Hyatt IV	\N	Orthodontist	6596 Kaleb Plaza Apt. 364\nWest Tracy, TN 56829	Ut sint aut fugiat libero placeat molestiae reprehenderit. Nobis voluptas officia assumenda qui et beatae. Nisi reprehenderit sed doloribus quasi et. Maiores quia harum nihil quia veritatis quas autem.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
33	Keith Schiller	\N	Financial Manager	28599 Elisha Springs\nLake Sabrynafurt, LA 68302	Voluptas ipsa dolores aut quis magni. Ea rerum voluptatem eum eos sunt praesentium. Nisi corporis impedit nulla ut incidunt perspiciatis ab et. Molestias eveniet mollitia quos modi consequuntur et.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
34	Mr. Matteo Johns V	\N	Computer Repairer	95861 Bennie Lodge Apt. 902\nWest Frederick, HI 49954	Temporibus voluptatem dolores dicta impedit dolores. In repudiandae impedit deserunt aut amet. Quo optio cumque maxime dicta. Sunt esse ipsam dicta minus ullam sit dolorem.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
35	Harry Balistreri	\N	Forestry Conservation Science Teacher	3028 DuBuque Dale\nKatarinafort, ND 07066	Nam est qui officiis excepturi aut minus. Dolorem consequuntur ipsam voluptate quam vitae nulla. Laudantium et enim explicabo sit. Libero molestias est et dolorum est vel.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
36	Virginie Hilpert	\N	Storage Manager OR Distribution Manager	6515 Birdie Way Suite 560\nPort Richard, ME 66380	Quia amet consequatur quam eos et vel. Eligendi voluptas suscipit excepturi tempora dolorum. Consectetur tempora ipsum quis velit quibusdam.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
37	Augusta Mante	\N	Food Servers	6813 Blanda Corner Apt. 722\nEast Carolanneberg, NV 92097-6259	Rerum hic sed beatae dignissimos tempore illo est. Veniam et similique fugit quo. Sed minima enim aliquid et. Ut corrupti enim voluptatem nisi.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
38	Hester Reichel	\N	Supervisor of Customer Service	258 Mafalda Common Apt. 190\nSouth Fayeberg, ID 49556	Eius repellendus incidunt enim. Voluptatem nemo doloremque quod. Ex sequi velit corporis qui nobis minus esse rerum.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
39	Haylee Bogisich	\N	Production Worker	41996 Schultz Fields Apt. 674\nWest Heloise, SC 28678	Doloremque ipsam enim nihil delectus. Optio qui fuga et expedita. Facere maiores voluptates voluptates. Magnam voluptas corporis ad beatae.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
40	Amari Champlin	\N	Director Religious Activities	413 Lind Land Suite 286\nHettingerfort, MO 95964-8234	Dolorem vero voluptatem voluptatibus consequatur provident quidem earum modi. Dolore sunt dolore et reiciendis sit. Est molestiae ad consequatur laboriosam.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
41	Prof. Raheem Johnson	\N	Director Of Social Media Marketing	229 Harber Springs\nTamarahaven, TN 67049	Explicabo consequatur possimus aspernatur quos cum doloribus. Maiores officiis laboriosam nemo at assumenda. Officia quas aliquid nihil quisquam qui. Qui quisquam aut ut.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
42	Seth McKenzie	\N	Electrical Power-Line Installer	795 Kreiger Junction Apt. 317\nLeschton, KY 35632-3707	Ut quam aperiam impedit corrupti excepturi dolores odio. Vero omnis quis et atque. Deserunt et laudantium tenetur ea. Cumque ea expedita enim. Architecto excepturi beatae voluptatibus voluptatem qui aspernatur.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
43	Renee Nienow	\N	Sheet Metal Worker	1458 Stehr Creek Apt. 653\nWest Desmond, MT 79522	Eum iure animi beatae sint. Deserunt ut sit aut exercitationem quia. Beatae quia labore itaque nisi.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
44	Ines Ratke	\N	Plating Operator OR Coating Machine Operator	528 Leola Shores Apt. 699\nFritschview, MT 76917-0237	Et sapiente aut corporis quia temporibus quo. Odio est dolorem excepturi odit. Aut libero ipsa dolor non.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
45	Prof. Melvin Bradtke	\N	Bailiff	144 Boyer Islands Apt. 142\nSouth Colby, AR 20030	Exercitationem dolores repudiandae rerum non. Reprehenderit nam maxime architecto omnis sed. Eum et earum repellendus veniam.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
46	Lavinia Muller	\N	Pharmacist	8821 Cyril Road\nKrajcikview, MD 62708	Voluptatem sed ipsum omnis aliquam consequatur et omnis. Corporis iure rerum voluptas sint incidunt fuga assumenda animi. Non et mollitia consequatur non ratione.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
47	Arne Heaney	\N	Stationary Engineer	60736 Towne Passage\nMakenzieberg, NJ 09379	Ut itaque in et vel similique aperiam amet expedita. Dolorem ea et adipisci earum incidunt et. Adipisci maiores et omnis sunt odit voluptatem eveniet.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
48	Jaron Jenkins PhD	\N	Administrative Services Manager	337 Reilly Station\nKerlukemouth, PA 03194	Placeat doloremque neque molestias deleniti deleniti. Sunt cum et repudiandae. Repellat vel animi voluptas.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
49	Brooklyn Collins	\N	Automatic Teller Machine Servicer	852 Velda Wells Apt. 702\nHuelsborough, WI 36974-0215	Omnis ducimus velit autem sed incidunt doloremque occaecati. Voluptatem est corporis consequuntur ea rem architecto. Non impedit sit explicabo tenetur. Dicta consequuntur sed laudantium perferendis alias quidem tempore.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
50	Julien Gislason	\N	Nursery Manager	1346 Turcotte Throughway\nSouth Liam, NV 03072	Doloremque dicta velit animi modi ea neque. Harum voluptate repudiandae porro sint dolor facere. Quod sint omnis commodi nam nobis earum deleniti. Dolor a perspiciatis aut dolores.	Active	2026-03-30 18:07:37	2026-03-30 18:07:37
\.


--
-- Data for Name: tour_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tour_batches (id, tour_package_id, start_date, end_date, max_people, available_seats, price, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tour_faqs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tour_faqs (id, tour_package_id, question, answer, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tour_package_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tour_package_images (id, tour_package_id, image_path, caption, is_featured, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tour_package_services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tour_package_services (id, tour_package_id, service_id, title, description, price, status, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tour_package_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tour_package_types (id, name, slug, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tour_package_videos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tour_package_videos (id, tour_package_id, title, iframe_embed_code, iframe, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tour_packages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tour_packages (id, our_country_id, service_id, title, slug, short_description, long_description, price_includes, price_excludes, what_to_expect, itinerary, top_deal, favourite_destination, location, duration, accomodation, type, difficulty, package_type, max_elevation, max_people, available_seats, best_season, pickup, drop, end_point, start_point, price, status, more_details, images, created_at, updated_at, is_featured, "order", parent_id, tour_package_type_id) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, full_name, role, "position", image, email, password, email_link, facebook_link, instagram_link, twitter_link, phonenumber, notes, email_verified_at, remember_token, created_at, updated_at, google_id, "order") FROM stdin;
1	Roshan Dhungana	Admin	Programmer	https://via.placeholder.com/150	adminstar@gmail.com	$2y$10$iHxJStjPYrxU/I8BiA7rsO7Y72vIzQ06VhHIMMkUWRcXb3LWLUkKy	adminstar@gmail.com	https://facebook.com/roshan	https://instagram.com/roshan	https://twitter.com/roshan	9823681753	Magnam quibusdam labore ipsa qui corrupti exercitationem. Et provident quia quo ut repellendus incidunt. Commodi deserunt dignissimos voluptatibus iure molestiae expedita inventore. Eius aut quis ut deserunt.	\N	\N	2026-03-30 18:07:36	2026-03-30 18:07:36	c14d60f0-2c43-3df2-be47-c85ac50d99aa	0
2	Dr. Sister Huels DVM	User	Special Forces Officer	front/images/team/team6.jpg	hebert@example.org	$2y$10$urFwtnYEgnyzTdYTc9P.IuTBLAvubNC8lzkpQvCR0ly7IxoWDbbcK	emiller@stiedemann.com	http://torp.com/quis-vitae-autem-ipsam-qui-exercitationem-quod-voluptatem	https://instagram.com/tyreek03	https://twitter.com/christiansen.ron	+15207874287	Veritatis ut aperiam autem laudantium aut temporibus rerum voluptate. Dolore deleniti amet aut maiores.	\N	\N	2026-03-30 18:07:36	2026-03-30 18:07:36	97e45219-b3f5-39c0-91ae-cdbd4eeb31b5	0
3	Adam Harris	User	Radio Operator	front/images/team/team6.jpg	smorar@example.com	$2y$10$NXdqN8yzmv.PHu6C1MfzsuM8fB686Pj61jerI4JYz8P4OHlS4rOgi	gerlach.trisha@goldner.com	http://crist.com/aut-deserunt-quam-quasi-odio-assumenda	https://instagram.com/kieran50	https://twitter.com/urban.schulist	+1-276-965-7568	Ut aspernatur odio explicabo assumenda. Ut enim dolor ut et explicabo. Magni libero quasi enim consequatur quas. A sit nostrum rem maiores.	\N	\N	2026-03-30 18:07:36	2026-03-30 18:07:36	f1906458-f0e2-319e-82f3-609de1993b11	0
4	Mr. Gillian Ratke PhD	Admin	Freight and Material Mover	front/images/team/team6.jpg	russel.jonathon@example.net	$2y$10$UgrTNjU5guIcZja0fT1G1uo00s/QKdZCnwu3cpEUmXOeUqxyGF4B6	elbert63@yahoo.com	http://www.runolfsdottir.com/aut-voluptatibus-dolor-neque-reprehenderit-qui-aperiam-cum	https://instagram.com/devan.wintheiser	https://twitter.com/jordane.bednar	239-420-5764	Quaerat eaque reiciendis laudantium. Facere saepe natus incidunt harum assumenda. Excepturi fuga eos eos. Aut ad eaque quisquam.	\N	\N	2026-03-30 18:07:36	2026-03-30 18:07:36	c1ac351c-2645-3bde-8aa0-92ec33e6ce46	0
5	Maurice Bernhard	Admin	Political Science Teacher	front/images/team/team6.jpg	kilback.abe@example.net	$2y$10$h2hQzkIbfm5Qydbh2WIj.eQqAS8T8IL.AweawzW73tyAbM2SlJYkG	brooklyn.runolfsdottir@gmail.com	http://www.weimann.biz/impedit-temporibus-voluptas-accusantium-et-eos	https://instagram.com/torp.adrianna	https://twitter.com/alfredo39	+13157188219	Ex non ut nesciunt enim illum vel. Voluptatem animi doloremque maiores consequatur sequi accusantium aperiam aspernatur. Minima voluptatibus voluptatum sint molestias ea soluta. Vel non saepe repudiandae sint inventore qui.	\N	\N	2026-03-30 18:07:37	2026-03-30 18:07:37	f54d2e30-cf83-3dd3-a7d8-3a397b705661	0
6	Kennedy Halvorson	Admin	Market Research Analyst	front/images/team/team6.jpg	hans72@example.net	$2y$10$iy4gIG/9rfUA2fEkSHWfiubt5pQg3vDzGEpamW6ItjZVQVhpXgAgK	carole41@hermann.org	http://www.bayer.com/	https://instagram.com/rey12	https://twitter.com/rodriguez.ernesto	1-210-347-1722	Sunt iste placeat occaecati veniam alias expedita aut. Ipsam quia provident deleniti. Quidem enim minus exercitationem eum voluptatem non beatae.	\N	\N	2026-03-30 18:07:37	2026-03-30 18:07:37	a998fc2c-4c42-300f-8f13-8d0c36ecd6e9	0
\.


--
-- Data for Name: vacancies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vacancies (id, company_id, custom_company_name, custom_company_country, vacancy_code, title, currency, interview_date, general_requirements, vacancy_image, description, status, created_at, updated_at) FROM stdin;
1	\N	Bryant and Fox LLC	Bray and Bradley Associates	\N	Quasi nostrud consec	GBP	1996-08-20	Esse est et providen.	uploads/vacancies/aDDkcIz5yvgmAvcGhB3UNS7GruBOqKpdQvzkdVqw.jpg	Recusandae. Exceptur.	active	2026-03-30 18:07:42	2026-03-30 18:12:17
\.


--
-- Data for Name: working_days; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.working_days (id, setting_id, days, starting_time, ending_time, created_at, updated_at) FROM stdin;
\.


--
-- Name: achievements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.achievements_id_seq', 4, true);


--
-- Name: applications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.applications_id_seq', 1, false);


--
-- Name: banner_slider_videos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.banner_slider_videos_id_seq', 1, false);


--
-- Name: call_to_actions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.call_to_actions_id_seq', 6, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 5, true);


--
-- Name: category_posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.category_posts_id_seq', 16, true);


--
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clients_id_seq', 10, true);


--
-- Name: comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comments_id_seq', 1, false);


--
-- Name: contacts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contacts_id_seq', 1, false);


--
-- Name: countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.countries_id_seq', 1, false);


--
-- Name: destinations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.destinations_id_seq', 1, false);


--
-- Name: employer_job_requests_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.employer_job_requests_id_seq', 1, false);


--
-- Name: employer_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.employer_profiles_id_seq', 1, false);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: faqs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.faqs_id_seq', 1, false);


--
-- Name: featured_services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.featured_services_id_seq', 1, false);


--
-- Name: frontends_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.frontends_id_seq', 1, false);


--
-- Name: gallery_albums_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.gallery_albums_id_seq', 2, true);


--
-- Name: gallery_media_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.gallery_media_id_seq', 11, true);


--
-- Name: home_slides_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.home_slides_id_seq', 5, true);


--
-- Name: itineraries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.itineraries_id_seq', 1, false);


--
-- Name: job_applications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.job_applications_id_seq', 1, false);


--
-- Name: job_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.job_categories_id_seq', 6, true);


--
-- Name: job_category_job_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.job_category_job_id_seq', 1, false);


--
-- Name: job_category_vacancy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.job_category_vacancy_id_seq', 6, true);


--
-- Name: job_seeker_profiles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.job_seeker_profiles_id_seq', 1, false);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 6, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 79, true);


--
-- Name: newsletter_subscribers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.newsletter_subscribers_id_seq', 1, false);


--
-- Name: notices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.notices_id_seq', 1, false);


--
-- Name: our_countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.our_countries_id_seq', 72, true);


--
-- Name: package_bookings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.package_bookings_id_seq', 1, false);


--
-- Name: package_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.package_types_id_seq', 1, false);


--
-- Name: page_banners_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.page_banners_id_seq', 7, true);


--
-- Name: pages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pages_id_seq', 16, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: post_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.post_images_id_seq', 1, false);


--
-- Name: post_tag_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.post_tag_id_seq', 21, true);


--
-- Name: posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.posts_id_seq', 10, true);


--
-- Name: price_includes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.price_includes_id_seq', 1, false);


--
-- Name: section_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.section_categories_id_seq', 1, true);


--
-- Name: section_category_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.section_category_images_id_seq', 1, false);


--
-- Name: section_contents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.section_contents_id_seq', 6, true);


--
-- Name: service_queries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.service_queries_id_seq', 50, true);


--
-- Name: services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.services_id_seq', 6, true);


--
-- Name: settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.settings_id_seq', 1, true);


--
-- Name: states_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.states_id_seq', 1, false);


--
-- Name: tags_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tags_id_seq', 10, true);


--
-- Name: testimonials_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.testimonials_id_seq', 50, true);


--
-- Name: tour_batches_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tour_batches_id_seq', 1, false);


--
-- Name: tour_faqs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tour_faqs_id_seq', 1, false);


--
-- Name: tour_package_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tour_package_images_id_seq', 1, false);


--
-- Name: tour_package_services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tour_package_services_id_seq', 1, false);


--
-- Name: tour_package_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tour_package_types_id_seq', 1, false);


--
-- Name: tour_package_videos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tour_package_videos_id_seq', 1, false);


--
-- Name: tour_packages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tour_packages_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 6, true);


--
-- Name: vacancies_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vacancies_id_seq', 1, true);


--
-- Name: working_days_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.working_days_id_seq', 1, false);


--
-- Name: achievements achievements_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.achievements
    ADD CONSTRAINT achievements_pkey PRIMARY KEY (id);


--
-- Name: applications applications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applications
    ADD CONSTRAINT applications_pkey PRIMARY KEY (id);


--
-- Name: banner_slider_videos banner_slider_videos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.banner_slider_videos
    ADD CONSTRAINT banner_slider_videos_pkey PRIMARY KEY (id);


--
-- Name: call_to_actions call_to_actions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.call_to_actions
    ADD CONSTRAINT call_to_actions_pkey PRIMARY KEY (id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: category_posts category_posts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_posts
    ADD CONSTRAINT category_posts_pkey PRIMARY KEY (id);


--
-- Name: clients clients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- Name: contacts contacts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contacts
    ADD CONSTRAINT contacts_pkey PRIMARY KEY (id);


--
-- Name: countries countries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id);


--
-- Name: destinations destinations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.destinations
    ADD CONSTRAINT destinations_pkey PRIMARY KEY (id);


--
-- Name: employer_job_requests employer_job_requests_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employer_job_requests
    ADD CONSTRAINT employer_job_requests_pkey PRIMARY KEY (id);


--
-- Name: employer_profiles employer_profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employer_profiles
    ADD CONSTRAINT employer_profiles_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: faqs faqs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faqs
    ADD CONSTRAINT faqs_pkey PRIMARY KEY (id);


--
-- Name: featured_services featured_services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.featured_services
    ADD CONSTRAINT featured_services_pkey PRIMARY KEY (id);


--
-- Name: frontends frontends_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.frontends
    ADD CONSTRAINT frontends_pkey PRIMARY KEY (id);


--
-- Name: gallery_albums gallery_albums_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gallery_albums
    ADD CONSTRAINT gallery_albums_pkey PRIMARY KEY (id);


--
-- Name: gallery_albums gallery_albums_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gallery_albums
    ADD CONSTRAINT gallery_albums_slug_unique UNIQUE (slug);


--
-- Name: gallery_media gallery_media_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gallery_media
    ADD CONSTRAINT gallery_media_pkey PRIMARY KEY (id);


--
-- Name: home_slides home_slides_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.home_slides
    ADD CONSTRAINT home_slides_pkey PRIMARY KEY (id);


--
-- Name: itineraries itineraries_package_order_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itineraries
    ADD CONSTRAINT itineraries_package_order_unique UNIQUE (tour_package_id, "order");


--
-- Name: itineraries itineraries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itineraries
    ADD CONSTRAINT itineraries_pkey PRIMARY KEY (id);


--
-- Name: job_applications job_applications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_applications
    ADD CONSTRAINT job_applications_pkey PRIMARY KEY (id);


--
-- Name: job_categories job_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_categories
    ADD CONSTRAINT job_categories_pkey PRIMARY KEY (id);


--
-- Name: job_categories job_categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_categories
    ADD CONSTRAINT job_categories_slug_unique UNIQUE (slug);


--
-- Name: job_category_job job_category_job_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_job
    ADD CONSTRAINT job_category_job_pkey PRIMARY KEY (id);


--
-- Name: job_category_vacancy job_category_vacancy_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_vacancy
    ADD CONSTRAINT job_category_vacancy_pkey PRIMARY KEY (id);


--
-- Name: job_category_vacancy job_category_vacancy_vacancy_id_job_category_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_vacancy
    ADD CONSTRAINT job_category_vacancy_vacancy_id_job_category_id_unique UNIQUE (vacancy_id, job_category_id);


--
-- Name: job_seeker_profiles job_seeker_profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_seeker_profiles
    ADD CONSTRAINT job_seeker_profiles_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_job_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_job_code_unique UNIQUE (job_code);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: newsletter_subscribers newsletter_subscribers_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newsletter_subscribers
    ADD CONSTRAINT newsletter_subscribers_email_unique UNIQUE (email);


--
-- Name: newsletter_subscribers newsletter_subscribers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newsletter_subscribers
    ADD CONSTRAINT newsletter_subscribers_pkey PRIMARY KEY (id);


--
-- Name: notices notices_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notices
    ADD CONSTRAINT notices_pkey PRIMARY KEY (id);


--
-- Name: our_countries our_countries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.our_countries
    ADD CONSTRAINT our_countries_pkey PRIMARY KEY (id);


--
-- Name: our_countries our_countries_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.our_countries
    ADD CONSTRAINT our_countries_slug_unique UNIQUE (slug);


--
-- Name: package_bookings package_bookings_booking_reference_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_bookings
    ADD CONSTRAINT package_bookings_booking_reference_unique UNIQUE (booking_reference);


--
-- Name: package_bookings package_bookings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_bookings
    ADD CONSTRAINT package_bookings_pkey PRIMARY KEY (id);


--
-- Name: package_types package_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_types
    ADD CONSTRAINT package_types_pkey PRIMARY KEY (id);


--
-- Name: package_types package_types_title_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_types
    ADD CONSTRAINT package_types_title_unique UNIQUE (title);


--
-- Name: page_banners page_banners_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.page_banners
    ADD CONSTRAINT page_banners_pkey PRIMARY KEY (id);


--
-- Name: pages pages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);


--
-- Name: pages pages_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_slug_unique UNIQUE (slug);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: post_images post_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_images
    ADD CONSTRAINT post_images_pkey PRIMARY KEY (id);


--
-- Name: post_tag post_tag_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_tag
    ADD CONSTRAINT post_tag_pkey PRIMARY KEY (id);


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id);


--
-- Name: posts posts_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_slug_unique UNIQUE (slug);


--
-- Name: price_includes price_includes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.price_includes
    ADD CONSTRAINT price_includes_pkey PRIMARY KEY (id);


--
-- Name: section_categories section_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_categories
    ADD CONSTRAINT section_categories_pkey PRIMARY KEY (id);


--
-- Name: section_categories section_categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_categories
    ADD CONSTRAINT section_categories_slug_unique UNIQUE (slug);


--
-- Name: section_category_images section_category_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_category_images
    ADD CONSTRAINT section_category_images_pkey PRIMARY KEY (id);


--
-- Name: section_contents section_contents_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_contents
    ADD CONSTRAINT section_contents_pkey PRIMARY KEY (id);


--
-- Name: service_queries service_queries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.service_queries
    ADD CONSTRAINT service_queries_pkey PRIMARY KEY (id);


--
-- Name: services services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services
    ADD CONSTRAINT services_pkey PRIMARY KEY (id);


--
-- Name: settings settings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);


--
-- Name: states states_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.states
    ADD CONSTRAINT states_pkey PRIMARY KEY (id);


--
-- Name: tags tags_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_name_unique UNIQUE (name);


--
-- Name: tags tags_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_pkey PRIMARY KEY (id);


--
-- Name: testimonials testimonials_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.testimonials
    ADD CONSTRAINT testimonials_pkey PRIMARY KEY (id);


--
-- Name: tour_batches tour_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_batches
    ADD CONSTRAINT tour_batches_pkey PRIMARY KEY (id);


--
-- Name: tour_faqs tour_faqs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_faqs
    ADD CONSTRAINT tour_faqs_pkey PRIMARY KEY (id);


--
-- Name: tour_package_images tour_package_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_images
    ADD CONSTRAINT tour_package_images_pkey PRIMARY KEY (id);


--
-- Name: tour_package_services tour_package_services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_services
    ADD CONSTRAINT tour_package_services_pkey PRIMARY KEY (id);


--
-- Name: tour_package_types tour_package_types_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_types
    ADD CONSTRAINT tour_package_types_name_unique UNIQUE (name);


--
-- Name: tour_package_types tour_package_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_types
    ADD CONSTRAINT tour_package_types_pkey PRIMARY KEY (id);


--
-- Name: tour_package_types tour_package_types_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_types
    ADD CONSTRAINT tour_package_types_slug_unique UNIQUE (slug);


--
-- Name: tour_package_videos tour_package_videos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_videos
    ADD CONSTRAINT tour_package_videos_pkey PRIMARY KEY (id);


--
-- Name: tour_packages tour_packages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_packages
    ADD CONSTRAINT tour_packages_pkey PRIMARY KEY (id);


--
-- Name: tour_packages tour_packages_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_packages
    ADD CONSTRAINT tour_packages_slug_unique UNIQUE (slug);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: vacancies vacancies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacancies
    ADD CONSTRAINT vacancies_pkey PRIMARY KEY (id);


--
-- Name: vacancies vacancies_vacancy_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacancies
    ADD CONSTRAINT vacancies_vacancy_code_unique UNIQUE (vacancy_code);


--
-- Name: working_days working_days_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.working_days
    ADD CONSTRAINT working_days_pkey PRIMARY KEY (id);


--
-- Name: achievements_status_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX achievements_status_index ON public.achievements USING btree (status);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: applications applications_job_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applications
    ADD CONSTRAINT applications_job_id_foreign FOREIGN KEY (job_id) REFERENCES public.jobs(id) ON DELETE CASCADE;


--
-- Name: applications applications_job_seeker_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.applications
    ADD CONSTRAINT applications_job_seeker_id_foreign FOREIGN KEY (job_seeker_id) REFERENCES public.job_seeker_profiles(id) ON DELETE CASCADE;


--
-- Name: category_posts category_posts_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_posts
    ADD CONSTRAINT category_posts_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE CASCADE;


--
-- Name: category_posts category_posts_post_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_posts
    ADD CONSTRAINT category_posts_post_id_foreign FOREIGN KEY (post_id) REFERENCES public.posts(id) ON DELETE CASCADE;


--
-- Name: comments comments_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE;


--
-- Name: employer_profiles employer_profiles_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employer_profiles
    ADD CONSTRAINT employer_profiles_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: featured_services featured_services_service_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.featured_services
    ADD CONSTRAINT featured_services_service_id_foreign FOREIGN KEY (service_id) REFERENCES public.services(id) ON DELETE CASCADE;


--
-- Name: gallery_albums gallery_albums_client_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gallery_albums
    ADD CONSTRAINT gallery_albums_client_id_foreign FOREIGN KEY (client_id) REFERENCES public.clients(id) ON DELETE CASCADE;


--
-- Name: gallery_media gallery_media_gallery_album_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gallery_media
    ADD CONSTRAINT gallery_media_gallery_album_id_foreign FOREIGN KEY (gallery_album_id) REFERENCES public.gallery_albums(id) ON DELETE CASCADE;


--
-- Name: itineraries itineraries_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itineraries
    ADD CONSTRAINT itineraries_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: job_applications job_applications_job_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_applications
    ADD CONSTRAINT job_applications_job_id_foreign FOREIGN KEY (job_id) REFERENCES public.jobs(id) ON DELETE CASCADE;


--
-- Name: job_applications job_applications_job_seeker_profile_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_applications
    ADD CONSTRAINT job_applications_job_seeker_profile_id_foreign FOREIGN KEY (job_seeker_profile_id) REFERENCES public.job_seeker_profiles(id) ON DELETE SET NULL;


--
-- Name: job_category_job job_category_job_job_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_job
    ADD CONSTRAINT job_category_job_job_category_id_foreign FOREIGN KEY (job_category_id) REFERENCES public.job_categories(id) ON DELETE CASCADE;


--
-- Name: job_category_job job_category_job_job_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_job
    ADD CONSTRAINT job_category_job_job_id_foreign FOREIGN KEY (job_id) REFERENCES public.jobs(id) ON DELETE CASCADE;


--
-- Name: job_category_vacancy job_category_vacancy_job_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_vacancy
    ADD CONSTRAINT job_category_vacancy_job_category_id_foreign FOREIGN KEY (job_category_id) REFERENCES public.job_categories(id) ON DELETE CASCADE;


--
-- Name: job_category_vacancy job_category_vacancy_vacancy_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_category_vacancy
    ADD CONSTRAINT job_category_vacancy_vacancy_id_foreign FOREIGN KEY (vacancy_id) REFERENCES public.vacancies(id) ON DELETE CASCADE;


--
-- Name: job_seeker_profiles job_seeker_profiles_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_seeker_profiles
    ADD CONSTRAINT job_seeker_profiles_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- Name: jobs jobs_employer_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_employer_id_foreign FOREIGN KEY (employer_id) REFERENCES public.employer_profiles(id) ON DELETE SET NULL;


--
-- Name: jobs jobs_our_country_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_our_country_id_foreign FOREIGN KEY (our_country_id) REFERENCES public.our_countries(id) ON DELETE SET NULL;


--
-- Name: jobs jobs_vacancy_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_vacancy_id_foreign FOREIGN KEY (vacancy_id) REFERENCES public.vacancies(id) ON DELETE CASCADE;


--
-- Name: package_bookings package_bookings_tour_batch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_bookings
    ADD CONSTRAINT package_bookings_tour_batch_id_foreign FOREIGN KEY (tour_batch_id) REFERENCES public.tour_batches(id) ON DELETE SET NULL;


--
-- Name: package_bookings package_bookings_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_bookings
    ADD CONSTRAINT package_bookings_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: package_bookings package_bookings_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.package_bookings
    ADD CONSTRAINT package_bookings_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: post_images post_images_post_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_images
    ADD CONSTRAINT post_images_post_id_foreign FOREIGN KEY (post_id) REFERENCES public.posts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: post_tag post_tag_post_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_tag
    ADD CONSTRAINT post_tag_post_id_foreign FOREIGN KEY (post_id) REFERENCES public.posts(id) ON DELETE CASCADE;


--
-- Name: post_tag post_tag_tag_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_tag
    ADD CONSTRAINT post_tag_tag_id_foreign FOREIGN KEY (tag_id) REFERENCES public.tags(id) ON DELETE CASCADE;


--
-- Name: posts posts_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON UPDATE CASCADE;


--
-- Name: posts posts_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON UPDATE CASCADE;


--
-- Name: price_includes price_includes_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.price_includes
    ADD CONSTRAINT price_includes_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: section_category_images section_category_images_section_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_category_images
    ADD CONSTRAINT section_category_images_section_category_id_foreign FOREIGN KEY (section_category_id) REFERENCES public.section_categories(id) ON DELETE CASCADE;


--
-- Name: section_contents section_contents_section_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section_contents
    ADD CONSTRAINT section_contents_section_category_id_foreign FOREIGN KEY (section_category_id) REFERENCES public.section_categories(id) ON DELETE CASCADE;


--
-- Name: service_queries service_queries_service_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.service_queries
    ADD CONSTRAINT service_queries_service_id_foreign FOREIGN KEY (service_id) REFERENCES public.services(id) ON DELETE CASCADE;


--
-- Name: tour_batches tour_batches_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_batches
    ADD CONSTRAINT tour_batches_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: tour_faqs tour_faqs_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_faqs
    ADD CONSTRAINT tour_faqs_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: tour_package_images tour_package_images_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_images
    ADD CONSTRAINT tour_package_images_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: tour_package_services tour_package_services_service_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_services
    ADD CONSTRAINT tour_package_services_service_id_foreign FOREIGN KEY (service_id) REFERENCES public.services(id) ON DELETE CASCADE;


--
-- Name: tour_package_services tour_package_services_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_services
    ADD CONSTRAINT tour_package_services_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: tour_package_videos tour_package_videos_tour_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_package_videos
    ADD CONSTRAINT tour_package_videos_tour_package_id_foreign FOREIGN KEY (tour_package_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: tour_packages tour_packages_our_country_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_packages
    ADD CONSTRAINT tour_packages_our_country_id_foreign FOREIGN KEY (our_country_id) REFERENCES public.our_countries(id) ON DELETE CASCADE;


--
-- Name: tour_packages tour_packages_parent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_packages
    ADD CONSTRAINT tour_packages_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES public.tour_packages(id) ON DELETE CASCADE;


--
-- Name: tour_packages tour_packages_service_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_packages
    ADD CONSTRAINT tour_packages_service_id_foreign FOREIGN KEY (service_id) REFERENCES public.services(id) ON DELETE CASCADE;


--
-- Name: tour_packages tour_packages_tour_package_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tour_packages
    ADD CONSTRAINT tour_packages_tour_package_type_id_foreign FOREIGN KEY (tour_package_type_id) REFERENCES public.tour_package_types(id) ON DELETE SET NULL;


--
-- Name: vacancies vacancies_company_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacancies
    ADD CONSTRAINT vacancies_company_id_foreign FOREIGN KEY (company_id) REFERENCES public.clients(id) ON DELETE SET NULL;


--
-- Name: working_days working_days_setting_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.working_days
    ADD CONSTRAINT working_days_setting_id_foreign FOREIGN KEY (setting_id) REFERENCES public.settings(id) ON UPDATE CASCADE;


--
-- PostgreSQL database dump complete
--

\unrestrict FRizywIt0LPhMCXyc7T3PT6WDfgG24qzbKTNdJGV23bakZ3M11lc4qhHsRoQrXE

