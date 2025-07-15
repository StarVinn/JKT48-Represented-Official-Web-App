import http from 'k6/http';
import { check, sleep } from 'k6';
export const options = {
    stages: [
        { duration: "10s", target: 10 },
        { duration: "15s", target: 20 },
        { duration: "15s", target: 10 },
        { duration: "5s", target: 0 },
    ],
};
export default function () {
    const res = http.get("http://localhost:8000/api/members");
    check(res, {
        "status code 200": (r) => r.status === 200,
        "response time < 5000ms": (r) => r.timings.duration < 5000,
    });
    sleep(1);
}