From nginx:alpine
COPY nginx.conf /etc/nginx/nginx.conf
RUN mkdir -p /var/www/html/public
RUN chown -R nginx:nginx var/www/html
EXPOSE 80