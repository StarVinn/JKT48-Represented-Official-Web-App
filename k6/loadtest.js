import http from 'k6/http';
import { check, sleep } from 'k6';
export const options = {
    vus: 10,
    duration: "10s",
};
export default function () {
    const res = http.get("http://localhost:8000/api/setlists");
    check(res, {
        "status code 200": (r) => r.status === 200,
        "response time < 5000ms": (r) => r.timings.duration < 5000,
    });
    sleep(1);
}